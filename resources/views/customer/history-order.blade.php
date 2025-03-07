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
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>WORLD 3D</title>
</head>

<body class="flex flex-col min-h-screen">
    {{-- Navbar --}}
    <nav class="bg-white fixed top-0 left-0 w-full z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between h-20 px-6">
            <a href="{{ route('customer.index') }}">
                <img src="{{ asset('assets/images/LOGO.png') }}" class="w-32" alt="">
            </a>

            <!-- Menu (Hidden di Mobile) -->
            <div class="hidden md:flex space-x-5">
                <a href="#" class="nav-link active text-green-700 font-semibold">Home</a>
                <a href="#" class="nav-link text-green-700 font-semibold">Service</a>
                <a href="#" class="nav-link text-green-700 font-semibold">Product</a>
                <a href="#" class="nav-link text-green-700 font-semibold">Testimonial</a>
                <a href="#" class="nav-link text-green-700 font-semibold">History</a>
            </div>

            <!-- Button -->
            @guest
                <div class="hidden md:block">
                    <a href="{{ route('login.index') }}"
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
            <a href="#" class="nav-link active hover:text-green-700">Home</a>
            <a href="#" class="nav-link hover:text-green-700">Service</a>
            <a href="#" class="nav-link hover:text-green-700">Product</a>
            <a href="#" class="nav-link hover:text-green-700">Testimonial</a>
            <a href="#" class="nav-link hover:text-green-700">History</a>
            @guest
                <a href="{{ route('login.index') }}"
                    class="border-2 border-green-700 text-green-700 px-6 py-3 rounded-full text-lg font-semibold hover:bg-green-700 hover:text-white transition duration-300 flex items-center space-x-2">
                    Login
                </a>
            @endguest
            @auth
                <a href="{{ route('login.index') }}"
                    class="border-2 border-red-700 text-red-700 px-6 py-3 rounded-full text-lg font-semibold hover:bg-red-700 hover:text-white transition duration-300 flex items-center space-x-2">
                    Logout
                </a>
            @endauth
        </div>
    </nav>

    <!-- History Section -->
    <div class="max-w-7xl mx-auto px-6 pt-28 mb-10">
        <h2 class="text-4xl font-bold text-center mb-12 text-gray-900 drop-shadow-md">
            📦 History Pemesanan
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            @foreach ($order as $o)
                <div
                    class="relative bg-white bg-opacity-60 backdrop-blur-lg rounded-xl shadow-lg p-6 md:p-8
                            border-t-4 border-green-500 transition-all duration-300 hover:scale-105 hover:shadow-xl
                            w-full max-w-lg mx-auto flex flex-col md:flex-row items-center md:items-start space-y-4
                            md:space-y-0 md:space-x-6">
                    <img src="{{ asset('storage/' . $o->produkVideo->gambar_produk) }}" alt="Produk A"
                        class="w-32 h-32 object-cover rounded-lg md:w-40 md:h-40 shadow-md">
                    <div class="flex-1 text-center md:text-left space-y-3">
                        <h3 class="text-2xl font-semibold text-gray-900 drop-shadow-sm">
                            {{ $o->produkVideo->nama_produk }}
                        </h3>
                        <p class="text-sm md:text-base text-gray-600">
                            ID Pesanan: <span class="font-medium">{{ $o->id }}</span>
                        </p>
                        <p class="text-sm md:text-base text-gray-600">
                            Harga Video:
                            <span class="font-medium text-green-600">
                                Rp. {{ number_format($o->produkVideo->harga_produk, 0, ',', '.') }}
                            </span>
                        </p>
                        <p class="text-sm md:text-base text-gray-600">
                            Bayar:
                            <span class="font-medium text-green-600">
                                Rp. {{ number_format($o->bayar, 0, ',', '.') }}
                            </span>
                        </p>

                        @if ($o->sisa_bayar > 0)
                            <p class="text-sm md:text-base text-gray-600">
                                Sisa harus dibayar:
                                <span class="font-medium text-red-600">
                                    Rp. {{ number_format($o->sisa_bayar, 0, ',', '.') }}
                                </span>
                            </p>
                            <button onclick="openModal('{{ $o->id }}')"
                                class="mt-3 bg-red-500 text-white text-xs md:text-sm px-5 py-2 rounded-full hover:bg-red-600 transition shadow-md">
                                💳 Pelunasan
                            </button>
                        @endif

                        <p class="text-sm md:text-base text-gray-600">
                            Tanggal: <span
                                class="font-medium">{{ \Carbon\Carbon::parse($o->tanggal)->format('d-m-Y') }}
                            </span>
                        </p>

                        <span
                            class="inline-flex items-center mt-2 px-4 py-1 text-sm font-medium rounded-full
                                    border {{ $o->status == 'Lunas' ? 'bg-green-100 text-green-700 border-green-500' : 'bg-yellow-100 text-yellow-700 border-yellow-500' }}">
                            {{ $o->status }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal --}}
    @if (!$testimoni)
        <div id="testimonial-modal"
            class="fixed inset-30 flex items-start justify-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out">
            <div class="fixed inset-0 bg-black opacity-70"></div>
            <form action="{{ route('testimonial.store') }}" method="POST">
                @csrf
                <div id="modal-content"
                    class="bg-white border-2 border-blue-500 p-6 rounded-lg shadow-lg mt-10 w-96 transform -translate-y-20 opacity-0 transition-all duration-500 ease-out">
                    <h2 class="text-xl font-semibold mb-4 text-center">Beri Testimonial</h2>

                    <!-- Bintang Rating -->
                    <div class="flex justify-center space-x-1 mb-4 text-yellow-500">
                        <span class="cursor-pointer text-2xl" onclick="setRating(1)">&#9733;</span>
                        <span class="cursor-pointer text-2xl" onclick="setRating(2)">&#9733;</span>
                        <span class="cursor-pointer text-2xl" onclick="setRating(3)">&#9733;</span>
                        <span class="cursor-pointer text-2xl" onclick="setRating(4)">&#9733;</span>
                        <span class="cursor-pointer text-2xl" onclick="setRating(5)">&#9733;</span>
                        <input type="hidden" id="rating" name="rating" value="">
                    </div>

                    <textarea id="message" class="w-full p-3 border rounded-lg focus:ring-1 focus:ring-gray-100 focus:outline-none"
                        name="testimoni" rows="4" placeholder="write your message..."></textarea>

                    <div class="flex justify-end mt-4 space-x-2">
                        <button onclick="closeModal()"
                            class="bg-gray-300 px-4 py-2 rounded-xl hover:bg-gray-400 transition">Close</button>
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition">Send</button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    @foreach ($order as $o)
        <div id="modal-{{ $o->id }}"
            class="hidden fixed inset-0 bg-black/70 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Upload Bukti Transfer Pelunasan : </h3>
                <form action="{{ route('pelunasan.update', ['id' => Crypt::encryptString($o->id)]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="bayar">Sisa yang harus dibayar</label>
                    <input type="number" name="bayar" value="{{ $o->sisa_bayar }}"
                        class="block w-full text-sm border p-2 rounded-md mb-4">
                    <label for="bukti_transfer">Bukti Transfer</label>
                    <input type="file" name="bukti_transfer" accept="image/*"
                        class="block w-full text-sm border p-2 rounded-md mb-4">
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="closeModal('{{ $o->id }}')"
                            class="bg-gray-500 text-white px-4 py-2 rounded-lg">Batal</button>
                        <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            openModal();
        });

        function openModal() {
            let modal = document.getElementById('testimonial-modal');
            let modalContent = document.getElementById('modal-content');

            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');

            modalContent.classList.remove('-translate-y-20', 'opacity-0');
            modalContent.classList.add('translate-y-0', 'opacity-100');
        }

        function closeModal() {
            let modal = document.getElementById('testimonial-modal');
            let modalContent = document.getElementById('modal-content');

            modal.classList.add('opacity-0');
            modal.classList.remove('opacity-100');

            modalContent.classList.add('-translate-y-20', 'opacity-0');
            modalContent.classList.remove('translate-y-0', 'opacity-100');

            setTimeout(() => {
                modal.classList.add('pointer-events-none');
            }, 300);
        }

        function setRating(stars) {
            let starsElement = document.querySelectorAll('#testimonial-modal span');
            starsElement.forEach((star, index) => {
                star.innerHTML = index < stars ? '★' : '☆';
            });

            // Simpan nilai rating ke dalam input hidden
            document.getElementById('rating').value = stars;
            console.log(stars);

        }
    </script>

    <script>
        function openModal(id) {
            document.getElementById("modal-" + id).classList.remove("hidden");
        }

        function closeModal(id) {
            document.getElementById("modal-" + id).classList.add("hidden");
        }
    </script>

    <script>
        AOS.init();
    </script>
</body>

</html>
