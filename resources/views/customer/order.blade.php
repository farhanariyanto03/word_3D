<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    {{-- Navbar --}}
    <nav class="bg-white fixed top-0 left-0 w-full z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between h-20 px-6">
            <h1 class="text-green-700 font-semibold text-lg">WORD 3D | Check Out</h1>

            <!-- Hamburger Menu (Mobile) -->
            <button id="menu-btn" class="md:hidden text-green-700 focus:outline-none">
                <svg id="menu-icon" class="w-8 h-8 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </nav>

    {{-- Pembeli Section --}}
    <div class="container mx-auto p-8 mt-20 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- 🟢 Informasi Kontak Pembeli --}}
            <section class="md:col-span-2 bg-white p-8 shadow-lg rounded-2xl border-2 border-green-500">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-4 flex items-center gap-3">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 013 1.804m-5-3.804a4 4 0 10-6 0M12 12a4 4 0 110-8 4 4 0 010 8z"></path></svg>
                    Informasi Kontak Pembeli
                </h2>
                <div class="mt-6 space-y-3 text-gray-800 text-lg">
                    <p class="font-medium">Nama: <span class="text-gray-600">John Doe</span></p>
                    <p class="font-medium">No HP: <span class="text-gray-600">0812-3456-7890</span></p>
                </div>
            </section>

            {{-- 🟡 Produk yang Dibeli --}}
            <section class="md:col-span-2 bg-white p-8 shadow-lg rounded-2xl border-2 border-green-500">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-4 flex items-center gap-3">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M3 7h18M3 11h18M3 15h18M3 19h18"></path></svg>
                    Produk yang Dibeli
                </h2>
                <div class="mt-6 flex items-center gap-6 border-b pb-6 hover:bg-gray-100 transition rounded-lg p-4">
                    <img src="{{ asset('assets/images/img1.jpg') }}" class="w-32 h-32 rounded-lg shadow-md border" alt="Produk">
                    <div class="flex-1">
                        <p class="text-lg font-semibold">Video Animasi 3D</p>
                        <p class="text-md text-gray-600">Durasi: 5 Menit</p>
                    </div>
                    <p class="text-xl font-bold text-gray-800">Rp 500.000</p>
                </div>
            </section>

            {{-- 🔵 Ringkasan Pembayaran --}}
            <section class="bg-white p-8 shadow-lg rounded-2xl border-2 border-green-500">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-4 flex items-center gap-3">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M5.636 18.364a9 9 0 1112.728 0"></path></svg>
                    Ringkasan Pembayaran
                </h2>
                <div class="mt-6 space-y-4 text-lg">
                    <div class="flex justify-between text-gray-700">
                        <span>Subtotal</span>
                        <span class="font-medium">Rp 500.000</span>
                    </div>
                    <div class="flex justify-between text-xl font-semibold text-gray-900 border-t pt-4">
                        <span>Total Bayar</span>
                        <span>Rp 510.000</span>
                    </div>
                </div>
                <button class="w-full mt-6 bg-green-600 text-white py-4 rounded-xl hover:bg-green-700 transition text-lg font-semibold flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    Bayar Sekarang
                </button>
            </section>
        </div>
    </div>

</body>

</html>
