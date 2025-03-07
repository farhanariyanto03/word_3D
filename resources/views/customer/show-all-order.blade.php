<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/LOGO.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    {{-- @vite('resources/css/app.css')
    @vite('resources/js/app.js') --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-DTXZRgrS.css') }}">
    <title>WORLD 3D</title>
</head>

<body class="flex flex-col min-h-screen">
    {{-- Navbar --}}
    <nav class="bg-white fixed top-0 left-0 w-full z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between h-20 px-6">
            <a href="{{ route('customer.index') }}">
                <img src="{{ asset('assets/images/LOGO.png') }}" class="w-32" alt="">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-5">
                <a href="{{ route('customer.index') }}"
                    class="nav-link active text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Home
                </a>
                <a href="#service"
                    class="nav-link text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Service
                </a>
                <a href="{{ route('customer.index') }}"
                    class="nav-link text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Product
                </a>
                <a href="{{ route('customer.index') }}"
                    class="nav-link text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Testimonial
                </a>
                <a href="{{ route('history-order.index') }}"
                    class="nav-link text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    History
                </a>
            </div>

            <!-- Button -->
            @guest
                <div class="hidden md:block">
                    <a href="{{ route('login') }}"
                        class="border-2 border-green-700 text-green-700 px-5 py-2 rounded-full text-lg font-semibold hover:bg-green-700 hover:text-white transition duration-300 flex items-center space-x-2">
                        Login
                    </a>
                </div>
            @endguest
            @auth
                <div class="hidden md:block">
                    <a href="{{ route('logout') }}"
                        class="border-2 border-red-700 text-red-700 px-5 py-2 rounded-full text-lg font-semibold hover:bg-red-700 hover:text-white transition duration-300 flex items-center space-x-2">
                        Logout
                    </a>
                </div>
            @endauth

            <!-- Hamburger Menu (Mobile) -->
            <button id="menu-btn" class="md:hidden text-green-700 focus:outline-none">
                <svg id="menu-icon" class="w-8 h-8 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden fixed inset-0 bg-black bg-opacity-90 backdrop-blur-lg flex flex-col items-center justify-center space-y-6 text-white text-lg transition-all duration-600">
            <button id="close-menu" class="absolute top-6 right-6 text-white text-3xl">&times;</button>
            <a href="{{ route('customer.index') }}"
                class="nav-link active text-green-400 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full">
                Home
            </a>
            <a href="#"
                class="nav-link text-white font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full hover:text-green-400">
                Service
            </a>
            <a href="{{ route('customer.index') }}"
                class="nav-link text-white font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full hover:text-green-400">
                Product
            </a>
            <a href="{{ route('customer.index') }}"
                class="nav-link text-white font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full hover:text-green-400">
                Testimonial
            </a>
            <a href="{{ route('history-order.index') }}"
                class="nav-link text-white font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full hover:text-green-400">
                History
            </a>
            @guest
                <a href="{{ route('login') }}"
                    class="border-2 border-green-700 text-green-700 px-6 py-3 rounded-full text-lg font-semibold hover:bg-green-700 hover:text-white transition duration-300 flex items-center space-x-2">
                    Login
                </a>
            @endguest
            @auth
                <a href="{{ route('login') }}"
                    class="border-2 border-red-700 text-red-700 px-6 py-3 rounded-full text-lg font-semibold hover:bg-red-700 hover:text-white transition duration-300 flex items-center space-x-2">
                    Logout
                </a>
            @endauth
        </div>
    </nav>

    {{-- All Order --}}
    <section class="container mx-auto p-6 mt-24">
        <h2 class="text-2xl font-bold mb-4">Daftar Pemesan</h2>
        <div class="bg-white shadow-md rounded-lg p-4">
            <table class="w-full border-collapse border border-gray-300 text-center">
                <thead>
                    <tr class="bg-green-600">
                        <th class="border p-2 text-white">Nama Customer</th>
                        <th class="border p-2 text-white">ID Order</th>
                        <th class="border p-2 text-white">Progress</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border">
                            <td class="border p-2">{{ $order->user->nama }}</td>
                            <td class="border p-2">INV{{ str_repeat('*', 5) . substr($order->id, -2) }}</td>
                            <td class="border p-2">
                                <div class="w-full bg-gray-200 rounded-full h-4">
                                    <div class="{{ $order->color }} h-4 rounded-full text-xs text-center text-white"
                                        style="width: {{ $order->progress }}%">
                                        {{ $order->progress }}%
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-green-700 text-white py-10 px-6 md:px-12 mt-auto">
        <div
            class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center md:items-start text-center md:text-left gap-6">
            <div class="md:w-1/3">
                <h2 class="text-2xl font-extrabold">3D Video Store</h2>
                <p class="mt-2 text-sm text-gray-200">Toko terbaik untuk koleksi video 3D berkualitas tinggi.</p>
            </div>
            <div class="md:w-1/3">
                <h3 class="text-lg font-extrabold">Navigasi</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="#" class="hover:underline">Beranda</a></li>
                    <li><a href="#" class="hover:underline">Koleksi</a></li>
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Kontak</a></li>
                </ul>
            </div>
            <div class="md:w-1/3">
                <h3 class="text-lg font-extrabold">Ikuti Kami</h3>
                <div class="flex justify-center md:justify-start space-x-4 mt-3">
                    <a href="#" class="text-gray-200 hover:text-white"><i
                            class="fab fa-facebook text-2xl"></i></a>
                    <a href="#" class="text-gray-200 hover:text-white"><i
                            class="fab fa-twitter text-2xl"></i></a>
                    <a href="#" class="text-gray-200 hover:text-white"><i
                            class="fab fa-instagram text-2xl"></i></a>
                    <a href="#" class="text-gray-200 hover:text-white"><i
                            class="fab fa-youtube text-2xl"></i></a>
                </div>
            </div>
        </div>
        <div class="mt-6 text-center border-t border-gray-400 pt-4">
            <p class="text-sm">&copy; 2024 3D Video Store. All rights reserved.</p>
        </div>
    </footer>
    <script src="{{ asset('build/assets/app-6ScYOSIw.js') }}"></script>
</body>

</html>
