<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/LOGO-HIJAU.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    {{-- @vite('resources/css/app.css')
    @vite('resources/js/app.js') --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-CiPyLyTK.css') }}">
    <title>WORLD 3D</title>
</head>

<body>
    {{-- Navbar --}}
    <nav class="bg-white fixed top-0 left-0 w-full z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between h-20 px-6">
            <a href="{{ route('customer.index') }}">
                <img src="{{ asset('assets/images/fj-jf-logo-letter-designs-2-3b8bf7313ef88e1ab5bee6199d6cDf70c0f36fc4fb70b6fb950e63b6b7c0ccbcf (1).png') }}" class="w-32" alt="">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-5">
                <a href="{{ route('customer.index') }}"
                    class="nav-link active text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Home
                </a>
                <a href="#services"
                    class="nav-link text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Service
                </a>
                <a href="#products"
                    class="nav-link text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Produk
                </a>
                <a href="#testimonials"
                    class="nav-link text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Testimoni
                </a>
                <a href="{{ route('history-order.index') }}"
                    class="nav-link text-green-700 font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-1 after:bg-green-700 after:transition-all after:duration-300 hover:after:w-full">
                    Histori
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
            <a href="#services"
                class="nav-link text-white font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full hover:text-green-400">
                Service
            </a>
            <a href="#products"
                class="nav-link text-white font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full hover:text-green-400">
                Produk
            </a>
            <a href="#testimonials"
                class="nav-link text-white font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full hover:text-green-400">
                Testimoni
            </a>
            <a href="{{ route('history-order.index') }}"
                class="nav-link text-white font-semibold relative after:content-[''] after:absolute after:-bottom-1 after:left-1/2 after:-translate-x-1/2 after:w-0 after:h-1 after:bg-green-400 after:transition-all after:duration-300 hover:after:w-full hover:text-green-400">
                Histori
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

    <!-- Hero Section -->
    <section
        class="relative w-full h-screen bg-fixed bg-center bg-cover bg-no-repeat text-white flex items-center justify-center"
        style="background-image: url('{{ asset('assets/images/WhatsApp Image 2025-03-07 at 20.52.40_9e60d548.jpg') }}');">
        <div class="absolute inset-0 bg-black/70"></div> <!-- Overlay -->
        <div class="relative text-center px-6 md:px-12 max-w-4xl">
            <h1 data-aos="fade-up" data-aos-duration="1000"
                class="text-5xl md:text-7xl font-extrabold text-green-500 drop-shadow-lg">
                Revolusi Pengalaman 3D Anda Lebih Hidup, Lebih Realistis, Lebih Imersif!
            </h1>
            <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000"
                class="mt-6 text-lg md:text-2xl text-gray-300 font-light">
                Temukan video 3D berkualitas tinggi dan imersif yang dibuat untuk hiburan dan keunggulan bisnis.
            </p>
            <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000"
                class="mt-8 flex justify-center space-x-4">
                <a href="#products"
                    class="border-2 border-green-700 text-green-700 px-6 py-3 rounded-full text-lg font-semibold hover:bg-green-700 hover:text-white transition duration-300 flex items-center space-x-2">
                    <i class="ri-shopping-cart-2-line"></i>
                    <span>Order</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white py-16 px-6 md:px-12 text-white" id="services">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-green-500 drop-shadow-lg" data-aos="fade-up">
                Mengapa Memilih Video 3D Kami?
            </h2>
            <p class="mt-4 text-lg text-gray-600" data-aos="fade-up" data-aos-delay="200">
                Kami menawarkan pengalaman 3D yang mendalam dan berkualitas tinggi yang mendefinisikan ulang penceritaan visual.
            </p>
        </div>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Card 1 -->
            <div data-aos="zoom-in" data-aos-delay="300"
                class="relative bg-green-700 p-10 rounded-xl text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-green-600">
                <div
                    class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-white text-green-700 w-16 h-16 flex items-center justify-center rounded-full shadow-md transition duration-300 hover:rotate-12">
                    <i class="ri-film-line text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mt-12">Kualitas Ultra HD</h3>
                <p class="mt-4 text-lg text-gray-100">Nikmati video 3D sebening kristal dengan resolusi menakjubkan.</p>
            </div>

            <!-- Card 2 -->
            <div data-aos="zoom-in" data-aos-delay="400"
                class="relative bg-green-700 p-10 rounded-xl text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-green-600">
                <div
                    class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-white text-green-700 w-16 h-16 flex items-center justify-center rounded-full shadow-md transition duration-300 hover:rotate-12">
                    <i class="ri-goggles-line text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mt-12">Pengalaman Imersif</h3>
                <p class="mt-4 text-lg text-gray-100">Rasakan Pengalaman Imersif Jelajahi Dunia 3D yang Memukau dengan Konten Kami!</p>
            </div>

            <!-- Card 3 -->
            <div data-aos="zoom-in" data-aos-delay="500"
                class="relative bg-green-700 p-10 rounded-xl text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-green-600">
                <div
                    class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-white text-green-700 w-16 h-16 flex items-center justify-center rounded-full shadow-md transition duration-300 hover:rotate-12">
                    <i class="ri-customer-service-2-line text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mt-12">Dukungan 24/7</h3>
                <p class="mt-4 text-lg text-gray-100">Kami siap membantu Anda kapan saja dan di mana saja.</p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="bg-black text-white py-16 px-6 md:px-12" id="products">
        <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-green-500">Koleksi Video 3D Eksklusif</h2>
            <p class="mt-4 text-lg text-gray-400">Jelajahi video 3D berkualitas tinggi kami yang dibuat untuk hiburan & bisnis.</p>
        </div>

        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Product Card -->
            @foreach ($produk as $p)
                <div class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-lg group transition duration-500 hover:shadow-2xl hover:scale-105"
                    data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('storage/' . $p->gambar_produk) }}" alt="3D Video"
                        class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-semibold text-green-500 group-hover:text-green-400 transition">
                            {{ $p->nama_produk }}</h3>
                        <p class="mt-2 text-gray-400 text-sm">{{ $p->deskripsi_produk }}</p>
                        <p class="mt-2 text-green-400 font-bold text-xl">Rp.
                            {{ number_format($p->harga_produk, 0, ',', '.') }}</p>
                        @auth
                            <a href="{{ route('order.index', Crypt::encryptString($p->id)) }}"
                                class="mt-4 inline-block bg-green-600 text-white px-6 py-3 rounded-full font-semibold transition hover:bg-green-500 hover:shadow-lg animate-pulse">
                                <i class="ri-shopping-cart-2-line mr-2"></i> Buy Now
                            </a>
                        @endauth
                        <a href="{{ route('order.show-all', Crypt::encryptString($p->id)) }}"
                            class="mt-8 flex items-center justify-center text-blue-400">
                            Lihat Semua Order <i class="ri-arrow-right-line ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-gradient-to-b from-green-50 to-white py-16 px-6 md:px-12" id="testimonials">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-green-600">Apa Kata Pelanggan Kami</h2>
            <p class="mt-4 text-lg text-gray-600">Umpan balik nyata dari klien kami yang puas.</p>
        </div>

        <!-- Swiper Container -->
        <div class="mt-12 max-w-7xl w-full mx-auto relative">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Testimonial Card -->
                    @foreach ($testimoni as $t)
                        <div class="swiper-slide">
                            <div data-aos="fade-right" data-aos-duration="1000"
                                class="bg-white p-6 rounded-xl shadow-lg text-center border border-gray-200 transform hover:scale-105 transition duration-300">
                                <i
                                    class="ri-user-fill text-7xl rounded-full mx-auto border-4 border-green-500 shadow-md"></i>
                                <p class="mt-4 text-xl font-bold text-gray-800">{{ $t->user->name }}</p>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $t->rating)
                                        <span class="text-yellow-400 text-2xl">&#9733;</span>
                                    @else
                                        <span class="text-gray-300 text-2xl">&#9733;</span>
                                    @endif
                                @endfor
                                <p class="mt-4 text-gray-600 italic">“{{ $t->testimoni }}”</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Swiper Navigation -->
            <button
                class="swiper-button-prev absolute left-2 top-1/2 transform -translate-y-1/2 bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-700">
                &larr;
            </button>
            <button
                class="swiper-button-next absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-700">
                &rarr;
            </button>
        </div>
    </section>

    <!-- VideoY T Section -->
    <section class="bg-black text-white py-16 px-6 md:px-12" id="portfolio">
        <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-green-500">Portofolio Video 3D Kami</h2>
            <p class="mt-4 text-lg text-gray-400">Lihat proyek video 3D terbaik kami langsung dari YouTube.</p>
        </div>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 max-w-8xl mx-auto">
            @foreach ($video as $v)
                <div class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-lg transition duration-500 hover:shadow-2xl hover:scale-105 p-4"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe width="675" height="315" class="rounded-2xl" src="{{ $v->url_video }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="text-2xl font-semibold text-green-500">{{ $v->judul_video }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-green-700 text-white py-10 px-6 md:px-12">
        <div
            class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center md:items-start text-center md:text-left gap-6">
            <div class="md:w-1/3">
                <h2 class="text-2xl font-extrabold">3D Video Store</h2>
                <p class="mt-2 text-sm text-gray-200">Toko terbaik untuk koleksi video 3D berkualitas tinggi.</p>
            </div>

            <!-- Navigation Links -->
            <div class="md:w-1/3">
                <h3 class="text-lg font-extrabold">Navigasi</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="{{ route('customer.index') }}" class="hover:underline">Home</a></li>
                    <li><a href="{{ route('customer.index') }}" class="hover:underline">Service</a></li>
                    <li><a href="{{ route('customer.index') }}" class="hover:underline">Produk</a></li>
                    <li><a href="{{ route('customer.index') }}" class="hover:underline">Testimonial</a></li>
                    <li><a href="{{ route('history-order.index') }}" class="hover:underline">Histori</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="md:w-1/3">
                <h3 class="text-lg font-extrabold">Ikuti Kami</h3>
                <div class="flex justify-center md:justify-start space-x-4 mt-3">
                    <a href="https://www.facebook.com/arvann06" class="text-gray-200 hover:text-white"><i
                            class="fab fa-facebook text-2xl"></i></a>
                    <a href="https://www.instagram.com/arvannn06/" class="text-gray-200 hover:text-white">
                        <i class="fab fa-instagram text-2xl"></i></a>
                    <a href="https://wa.me/6282298961719" class="text-gray-200 hover:text-white"><i
                            class="fab fa-whatsapp text-2xl"></i></a>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center border-t border-gray-400 pt-4">
            <p class="text-sm">&copy; 2024 3D Video Store. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener("click", function(e) {
                e.preventDefault();

                const targetId = this.getAttribute("href").substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    const navbarHeight = document.querySelector("nav").offsetHeight;
                    const targetPosition = targetElement.offsetTop - navbarHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: "smooth"
                    });
                }
            });
        });
    </script>

    <script>
        AOS.init();
    </script>
    <script src="{{ asset('build/assets/app-6ScYOSIw.js') }}"></script>
</body>

</html>
