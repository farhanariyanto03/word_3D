<?php

namespace App\Http\Controllers\customer;

use App\Models\Order;
use App\Models\ProdukVideo;
use Illuminate\Http\Request;
use App\Models\NomorRekening;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Crypt;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('customer.index', [
            'produk' => ProdukVideo::all(),
            'testimoni' => Testimoni::all()
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

            $validatedData['user_id'] = 1;
            $validatedData['produk_video_id'] = $order->id;
            $validatedData['sisa_bayar'] = $totalHarga - $bayar;
            $validatedData['status'] = 'sudah bayar';

            if ($request->hasFile('bukti_tf')) {
                $file = $request->file('bukti_tf');
                $filePath = $file->store('bukti_tf', 'public');
                $validatedData['bukti_tf'] = $filePath;
            }

            Order::create($validatedData); // ID akan dibuat otomatis

            return redirect()->route('history-order.index')->with('success', 'Pesanan berhasil dibuat');
        } catch (\Exception $e) {
            Log::error('Order Store Error: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function historyOrder()
    {
        return view('customer.history-order', [
            // 'order' => Order::where('user_id', auth()->user()->id)->get()
            'order' => Order::all()
        ]);
    }

    public function testimonialStore(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'required',
            'testimoni' => 'required',
        ]);

        $validatedData['user_id'] = 1;

        Testimoni::create($validatedData);
        return redirect()->back()->with('success', 'Testimonial berhasil dikirim');
    }
}
