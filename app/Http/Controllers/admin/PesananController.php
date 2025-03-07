<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function index()
    {
        return view('admin.pesanan.index', [
            'title' => 'Pesanan',
            'order_sudah_bayar' => Order::where('status', 'sudah bayar')->get(),
            'order_proses' => Order::where('status', 'proses')->get(),
            'order_selesai' => Order::where('status', 'selesai')->get(),
        ]);
    }

    public function updateProses($id)
    {
        $order = Order::find($id);
        $order->status = 'proses';
        $order->save();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diupdate');
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $validatedData = $request->validate([
            'link_vidio' => 'required',
            'catatan' => 'nullable'
        ]);

        $order->link_vidio = $validatedData['link_vidio'];
        $order->catatan = $validatedData['catatan'];
        $order->save();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diupdate');
    }

    public function updateSelesai($id)
    {
        $order = Order::find($id);
        $order->status = 'selesai';
        $order->save();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diupdate');
    }

    public function cetakInvoice($id)
    {
        $order = Order::findOrFail($id);

        $pdf = Pdf::loadView('admin.pesanan.invoice', compact('order'));

        return $pdf->download('invoice_' . $order->user->nama . '.pdf');
    }
}
