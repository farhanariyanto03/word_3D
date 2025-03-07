<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\ProdukVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'total_produk' => ProdukVideo::count(),
            'pesanan_masuk'=> Order::where('status', 'sudah bayar')->count(),
            'pesanan_selesai'=> Order::where('status', 'selesai')->count()
        ]);
    }
}
