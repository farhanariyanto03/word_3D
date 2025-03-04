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
            'order' => Order::all()
        ]);
    }
}
