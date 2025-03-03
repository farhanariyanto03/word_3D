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
            <h1 class="text-green-700 font-semibold text-lg">WORD 3D</h1>

            <!-- Menu (Hidden di Mobile) -->
            <div class="hidden md:flex space-x-5">
                <a href="#" class="nav-link active text-green-700 font-semibold">Home</a>
                <a href="#" class="nav-link text-green-700 font-semibold">Service</a>
                <a href="#" class="nav-link text-green-700 font-semibold">Product</a>
                <a href="#" class="nav-link text-green-700 font-semibold">Testimonial</a>
            </div>

            <!-- Button -->
            <div class="hidden md:block">
                <a href="#"
                    class="border-2 border-green-700 text-green-700 px-5 py-2 rounded-full text-lg font-semibold hover:bg-green-700 hover:text-white transition duration-300 flex items-center space-x-2">
                    Login
                </a>
            </div>

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
            <a href="#" class="nav-link active hover:text-green-700">Home</a>
            <a href="#" class="nav-link hover:text-green-700">Service</a>
            <a href="#" class="nav-link hover:text-green-700">Product</a>
            <a href="#" class="nav-link hover:text-green-700">Testimonial</a>
            <a href="#"
                class="border-2 border-green-700 text-green-700 px-6 py-3 rounded-full text-lg font-semibold hover:bg-green-700 hover:text-white transition duration-300 flex items-center space-x-2">
                Login
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative w-full h-screen bg-black text-white flex items-center justify-center">
        <div class="absolute inset-0 bg-gradient-to-b from-black to-gray-900 opacity-75"></div>
        <div class="relative text-center px-6 md:px-12 max-w-4xl">
            <h1 class="text-5xl md:text-7xl font-extrabold text-green-500 drop-shadow-lg">Revolutionize Your 3D
                Experience</h1>
            <p class="mt-6 text-lg md:text-2xl text-gray-300 font-light">Discover high-quality, immersive 3D videos
                crafted for entertainment and business excellence.</p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="#"
                    class="border-2 border-green-700 text-green-700 px-6 py-3 rounded-full text-lg font-semibold hover:bg-green-700 hover:text-white transition duration-300 flex items-center space-x-2">
                    <i class="ri-shopping-cart-2-line"></i>
                    <span>Order</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white py-16 px-6 md:px-12 text-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-green-500 drop-shadow-lg">Why Choose Our 3D Videos?</h2>
            <p class="mt-4 text-lg text-gray-600">We offer high-quality, immersive 3D experiences that redefine visual
                storytelling.</p>
        </div>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div
                class="relative bg-green-700 p-10 rounded-xl text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-green-600">
                <div
                    class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-white text-green-700 w-16 h-16 flex items-center justify-center rounded-full shadow-md">
                    <i class="ri-film-line text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mt-12">Ultra HD Quality</h3>
                <p class="mt-4 text-lg text-gray-100">Enjoy crystal-clear 3D videos with stunning resolution.</p>
            </div>
            <div
                class="relative bg-green-700 p-10 rounded-xl text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-green-600">
                <div
                    class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-white text-green-700 w-16 h-16 flex items-center justify-center rounded-full shadow-md">
                    <i class="ri-goggles-line text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mt-12">Immersive Experience</h3>
                <p class="mt-4 text-lg text-gray-100">Get lost in the world of 3D with our immersive content.</p>
            </div>
            <div
                class="relative bg-green-700 p-10 rounded-xl text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:bg-green-600">
                <div
                    class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-white text-green-700 w-16 h-16 flex items-center justify-center rounded-full shadow-md">
                    <i class="ri-customer-service-2-line text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mt-12">24/7 Support</h3>
                <p class="mt-4 text-lg text-gray-100">We’re here to help you anytime, anywhere.</p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="bg-black text-white py-16 px-6 md:px-12">
        <div class="max-w-6xl mx-auto text-center" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold text-green-500">Exclusive 3D Video Collection</h2>
            <p class="mt-4 text-lg text-gray-400">Explore our high-quality 3D videos crafted for entertainment &
                business.</p>
        </div>

        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Product Card -->
            <div class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-lg group hover:shadow-2xl transition duration-300 transform hover:scale-105"
                data-aos="zoom-in" data-aos-delay="100">
                <img src="{{ asset('assets/images/img1.jpg') }}" alt="3D Video"
                    class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="p-6 text-center">
                    <h3 class="text-2xl font-semibold text-green-500 group-hover:text-green-400 transition">3D Sci-Fi
                        Adventure</h3>
                    <p class="mt-2 text-gray-400 text-sm">Experience the ultimate futuristic journey in 3D.</p>
                    <p class="mt-2 text-green-400 font-bold text-xl">$19.99</p>
                    <a href="#"
                        class="mt-4 inline-block bg-green-600 text-white px-6 py-3 rounded-full font-semibold transition hover:bg-green-500 hover:shadow-lg animate-pulse">
                        <i class="ri-shopping-cart-2-line mr-2"></i> Buy Now
                    </a>
                </div>
            </div>

            <div class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-lg group hover:shadow-2xl transition duration-300 transform hover:scale-105"
                data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('assets/images/img1.jpg') }}" alt="VR Experience"
                    class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="p-6 text-center">
                    <h3 class="text-2xl font-semibold text-green-500 group-hover:text-green-400 transition">Virtual
                        Reality Experience</h3>
                    <p class="mt-2 text-gray-400 text-sm">Immerse yourself in a mind-blowing VR environment.</p>
                    <p class="mt-2 text-green-400 font-bold text-xl">$24.99</p>
                    <a href="#"
                        class="mt-4 inline-block bg-green-600 text-white px-6 py-3 rounded-full font-semibold transition hover:bg-green-500 hover:shadow-lg animate-pulse">
                        <i class="ri-shopping-cart-2-line mr-2"></i> Buy Now
                    </a>
                </div>
            </div>

            <div class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-lg group hover:shadow-2xl transition duration-300 transform hover:scale-105"
                data-aos="zoom-in" data-aos-delay="300">
                <img src="{{ asset('assets/images/img1.jpg') }}" alt="3D Animation"
                    class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="p-6 text-center">
                    <h3 class="text-2xl font-semibold text-green-500 group-hover:text-green-400 transition">Animated 3D
                        Masterpiece</h3>
                    <p class="mt-2 text-gray-400 text-sm">A beautifully crafted animation in 3D format.</p>
                    <p class="mt-2 text-green-400 font-bold text-xl">$29.99</p>
                    <a href="#"
                        class="mt-4 inline-block bg-green-600 text-white px-6 py-3 rounded-full font-semibold transition hover:bg-green-500 hover:shadow-lg animate-pulse">
                        <i class="ri-shopping-cart-2-line mr-2"></i> Buy Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-gradient-to-b from-green-50 to-white py-16 px-6 md:px-12">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-green-600">What Our Customers Say</h2>
            <p class="mt-4 text-lg text-gray-600">Real feedback from our satisfied clients.</p>
        </div>

        <!-- Swiper Container -->
        <div class="mt-12 max-w-7xl w-full mx-auto relative">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Testimonial Card -->
                    <div class="swiper-slide">
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg text-center border border-gray-200 transform hover:scale-105 transition duration-300">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User"
                                class="w-20 h-20 rounded-full mx-auto border-4 border-green-500 shadow-md">
                            <p class="mt-4 text-xl font-bold text-gray-800">John Doe</p>
                            <div class="flex justify-center mt-2">
                                <span class="text-yellow-400 text-2xl">★★★★★</span>
                            </div>
                            <p class="mt-4 text-gray-600 italic">“The best 3D videos I’ve ever seen! Highly
                                recommended.”</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg text-center border border-gray-200 transform hover:scale-105 transition duration-300">
                            <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="User"
                                class="w-20 h-20 rounded-full mx-auto border-4 border-green-500 shadow-md">
                            <p class="mt-4 text-xl font-bold text-gray-800">Jane Smith</p>
                            <div class="flex justify-center mt-2">
                                <span class="text-yellow-400 text-2xl">★★★★★</span>
                            </div>
                            <p class="mt-4 text-gray-600 italic">“Absolutely stunning 3D effects! A must-try
                                experience.”</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg text-center border border-gray-200 transform hover:scale-105 transition duration-300">
                            <img src="https://randomuser.me/api/portraits/men/55.jpg" alt="User"
                                class="w-20 h-20 rounded-full mx-auto border-4 border-green-500 shadow-md">
                            <p class="mt-4 text-xl font-bold text-gray-800">Michael Lee</p>
                            <div class="flex justify-center mt-2">
                                <span class="text-yellow-400 text-2xl">★★★★★</span>
                            </div>
                            <p class="mt-4 text-gray-600 italic">“Fantastic customer service and high-quality 3D
                                content.”</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg text-center border border-gray-200 transform hover:scale-105 transition duration-300">
                            <img src="https://randomuser.me/api/portraits/men/55.jpg" alt="User"
                                class="w-20 h-20 rounded-full mx-auto border-4 border-green-500 shadow-md">
                            <p class="mt-4 text-xl font-bold text-gray-800">Michael Lee</p>
                            <div class="flex justify-center mt-2">
                                <span class="text-yellow-400 text-2xl">★★★★★</span>
                            </div>
                            <p class="mt-4 text-gray-600 italic">“Fantastic customer service and high-quality 3D
                                content.”</p>
                        </div>
                    </div>
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
                    <li><a href="#" class="hover:underline">Beranda</a></li>
                    <li><a href="#" class="hover:underline">Koleksi</a></li>
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Kontak</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="md:w-1/3">
                <h3 class="text-lg font-extrabold">Ikuti Kami</h3>
                <div class="flex justify-center md:justify-start space-x-4 mt-3">
                    <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-facebook text-2xl"></i></a>
                    <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-twitter text-2xl"></i></a>
                    <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-instagram text-2xl"></i></a>
                    <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-youtube text-2xl"></i></a>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center border-t border-gray-400 pt-4">
            <p class="text-sm">&copy; 2024 3D Video Store. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
