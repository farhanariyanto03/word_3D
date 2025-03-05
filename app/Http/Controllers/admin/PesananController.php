<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
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

    public function updateSelesai($id)
    {
        $order = Order::find($id);
        $order->status = 'selesai';
        $order->save();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diupdate');
    }
}
