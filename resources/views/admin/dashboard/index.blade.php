@extends('admin.layout')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
    <!-- Total Produk -->
    <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4 border-l-4 border-2 border-green-500">
        <i class="ri-box-3-line text-blue-500 text-4xl"></i>
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Total Produk</h2>
            <p class="text-2xl font-bold text-gray-900">100</p>
        </div>
    </div>

    <!-- Pesanan Masuk -->
    <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4 border-l-4 border-2 border-green-500">
        <i class="ri-shopping-cart-2-line text-yellow-500 text-4xl"></i>
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Pesanan Masuk</h2>
            <p class="text-2xl font-bold text-gray-900">25</p>
        </div>
    </div>

    <!-- Pesanan Selesai -->
    <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-4 border-l-4 border-2 border-green-500">
        <i class="ri-check-line text-green-500 text-4xl"></i>
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Pesanan Selesai</h2>
            <p class="text-2xl font-bold text-gray-900">80</p>
        </div>
    </div>
</div>
@endsection
