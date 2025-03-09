<?php

namespace App\Http\Controllers\customer;

use App\Models\Order;
use App\Models\Testimoni;
use App\Models\ProdukVideo;
use Illuminate\Http\Request;
use App\Models\NomorRekening;
use App\Mail\OrderNotificationMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\VideoYt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('customer.index', [
            'produk' => ProdukVideo::all(),
            'testimoni' => Testimoni::all(),
            'video' => VideoYt::all()
        ]);
    }

    public function order($id)
    {
        $id = Crypt::decryptString($id);
        $order = ProdukVideo::find($id);
        $norek = NomorRekening::all();

        return view('customer.order', compact('order', 'norek'));
    }

    public function orderStore(Request $request, $id)
    {
        $user = Auth::user();

        try {
            $id = Crypt::decryptString($id);
            $order = ProdukVideo::findOrFail($id);

            $validatedData = $request->validate([
                'nomor_rekening_id' => 'required',
                'bayar' => 'required|numeric|min:0',
                'bukti_tf' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            ], [
                'nomor_rekening_id.required' => 'Metode pembayaran harus dipilih.',
                'bayar.required' => 'Masukkan jumlah pembayaran.',
                'bayar.numeric' => 'Pembayaran harus berupa angka.',
                'bayar.min' => 'Pembayaran tidak boleh kurang dari 0.',
                'bukti_tf.required' => 'Bukti transfer harus diunggah.',
            ]);

            $totalHarga = $order->harga_produk;
            $minimalDp = $order->minimal_dp;
            $bayar = $request->bayar;

            if ($bayar > $totalHarga) {
                return redirect()->back()->with('error', 'Pembayaran melebihi total harga produk!')->withInput();
            }

            if ($bayar < $minimalDp) {
                return redirect()->back()->with('error', 'Pembayaran kurang dari minimal DP! ' . $minimalDp)->withInput();
            }

            $validatedData['user_id'] = $user->id;
            $validatedData['produk_video_id'] = $order->id;
            $validatedData['sisa_bayar'] = $totalHarga - $bayar;
            $validatedData['status'] = 'sudah bayar';

            if ($request->hasFile('bukti_tf')) {
                $file = $request->file('bukti_tf');
                $filePath = $file->store('bukti_tf', 'public');
                $validatedData['bukti_tf'] = $filePath;
            }

            $newOrder = Order::create($validatedData);

            // Kirim email dari email customer ke admin
            $adminEmail = "justplaycorporate@gmail.com"; // Ganti dengan email admin
            Mail::to($adminEmail)->send(new OrderNotificationMail($newOrder, $user->nama, $user->email, $order->nama_produk, $order->harga_produk, $order->bayar, $order->sisa_bayar));

            return redirect()->route('history-order.index')->with('success', 'Pesanan berhasil dibuat dan email telah dikirim ke admin.');
        } catch (\Exception $e) {
            Log::error('Order Store Error: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function historyOrder()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('customer.history-order', [
            'order' => Order::where('user_id', $user->id)->get(),
            'testimoni' => Testimoni::where('user_id', $user->id)->exists(),
        ]);
    }

    public function testimonialStore(Request $request)
    {
        $user = Auth::user();
        try {
            $validatedData = $request->validate([
                'rating' => 'required',
                'testimoni' => 'required',
            ]);

            $validatedData['user_id'] = $user->id;

            Testimoni::create($validatedData);
            return redirect()->back()->with('success', 'Testimonial berhasil dikirim');
        } catch (\Exception $e) {
            Log::error('Testimonial Store Error: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function pelunasan(Request $request, $id)
    {
        $id = Crypt::decryptString($id);
        $validatedData = $request->validate([
            'bayar' => 'required|numeric|min:0',
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'bayar.required' => 'Masukkan jumlah pembayaran.',
            'bayar.numeric' => 'Pembayaran harus berupa angka.',
            'bukti_transfer.required' => 'Bukti transfer harus diunggah.',
            'bukti_transfer.image' => 'File harus berupa gambar.',
        ]);

        $order = Order::findOrFail($id);

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $filename = 'bukti_tf/' . time() . '_' . $file->hashName();
            $file->storeAs('public', $filename);

            $buktiLama = $order->bukti_tf ? explode(',', $order->bukti_tf) : [];
            $buktiLama[] = $filename;
            $bukti_tf_baru = implode(',', $buktiLama);
        }

        $bayar_baru = $order->bayar + $request->bayar;
        $sisa_bayar_baru = $order->produkVideo->harga_produk - $bayar_baru;

        $order->update([
            'bayar' => $bayar_baru,
            'sisa_bayar' => $sisa_bayar_baru,
            'bukti_tf' => $bukti_tf_baru
        ]);

        return redirect()->route('history-order.index')->with('success', 'Pelunasan berhasil dikirim');
    }

    public function showAllOrder()
    {
        $orders = Order::with('user')
            ->orderByRaw("CASE WHEN status = 'histori' THEN 1 ELSE 0 END")
            ->orderBy('prioritas', 'asc')
            ->get();

        $orders->transform(function ($order) {
            switch ($order->status) {
                case 'proses':
                    $order->progress = 33.33;
                    $order->color = 'bg-yellow-500';
                    break;
                case 'selesai':
                    $order->progress = 66.66;
                    $order->color = 'bg-blue-500';
                    break;
                case 'histori':
                    $order->progress = 100;
                    $order->color = 'bg-green-500';
                    break;
                default:
                    $order->progress = 0;
                    $order->color = 'bg-gray-500';
            }
            return $order;
        });

        return view('customer.show-all-order', compact('orders'));
    }
}
