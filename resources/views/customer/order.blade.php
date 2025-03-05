<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/LOGO.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>WORLD 3D</title>
</head>

<body>
    {{-- Navbar --}}
    <nav class="bg-white fixed top-0 left-0 w-full z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between h-20 px-6">
            <a href="{{ route('customer.index') }}">
                <img src="{{ asset('assets/images/LOGO.png') }}" class="w-32" alt="">
            </a>

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

            {{-- Informasi Kontak Pembeli --}}
            <section class="md:col-span-3 bg-white p-8 shadow-lg rounded-2xl border-2 border-green-500">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-4 flex items-center gap-3">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A4 4 0 018 16h8a4 4 0 013 1.804m-5-3.804a4 4 0 10-6 0M12 12a4 4 0 110-8 4 4 0 010 8z">
                        </path>
                    </svg>
                    Contact Information
                </h2>
                <div class="mt-6 space-y-3 text-gray-800 text-lg">
                    <p class="font-medium">Name : <span class="text-gray-600">John Doe</span></p>
                    <p class="font-medium">No Telp : <span class="text-gray-600">0812-3456-7890</span></p>
                </div>
            </section>

            {{-- Produk yang Dibeli --}}
            <section class="md:col-span-3 bg-white p-8 shadow-lg rounded-2xl border-2 border-green-500">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-4 flex items-center gap-3">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M3 7h18M3 11h18M3 15h18M3 19h18">
                        </path>
                    </svg>
                    Products purchased
                </h2>
                @if ($order)
                    <div class="mt-6 flex items-center gap-6 border-b pb-6 hover:bg-gray-100 transition rounded-lg p-4">
                        <img src="{{ asset('storage/' . $order->gambar_produk) }}"
                            class="w-32 h-32 rounded-lg shadow-md border" alt="Produk">
                        <div class="flex-1">
                            <p class="text-lg font-semibold">{{ $order->nama_produk }}</p>
                            <p class="text-md text-gray-600">Deskripsi: {{ $order->deskripsi_produk }}</p>
                        </div>
                        <p class="text-xl font-bold text-gray-800">Rp
                            {{ number_format($order->harga_produk, 0, ',', '.') }}
                        </p>
                    </div>
                @else
                    <p class="text-red-500">Produk tidak ditemukan.</p>
                @endif
            </section>

            {{-- Ringkasan Pembayaran --}}
            <section class="md:col-span-3 bg-white p-8 shadow-lg rounded-2xl border-2 border-green-500">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-4 flex items-center gap-3">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4m0 4h.01M5.636 18.364a9 9 0 1112.728 0"></path>
                    </svg>
                    Metode Pembayaran & Ringkasan
                </h2>

                @if (session('error'))
                    <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-600 dark:text-white">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Metode Pembayaran -->
                <form action="{{ route('order.store', ['id' => Crypt::encryptString($order->id)]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mt-6 space-y-4 text-lg">
                        <h3 class="text-lg font-semibold text-gray-800">Pilih Metode Pembayaran:</h3>
                        <select id="bankSelect" name="nomor_rekening_id"
                            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2">
                            <option value="" disabled selected>Pilih Bank</option>
                            @foreach ($norek as $n)
                                <option value="{{ $n->id }}" data-nama_bank="{{ $n->nama_bank }}"
                                    data-nomor_rekening="{{ $n->nomor_rekening }}"
                                    data-atas_nama="{{ $n->atas_nama }}">
                                    {{ $n->nama_bank }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Informasi Transfer Bank -->
                    <div class="mt-6 space-y-4 text-lg border-t pt-4">
                        <h3 class="text-lg font-semibold text-gray-800">Informasi Transfer Bank:</h3>
                        <p>Bank : <span class="font-medium" id="bankName">-</span></p>
                        <p>No Rekening : <span class="font-medium" id="bankNumber">-</span></p>
                        <p>Atas Nama : <span class="font-medium" id="bankHolder">-</span></p>
                    </div>

                    <!-- Ringkasan Pembayaran -->
                    <div class="mt-6 space-y-4 text-lg border-t pt-4">
                        <h3 class="text-lg font-semibold text-gray-800">Ringkasan Pembayaran:</h3>
                        <div class="flex justify-between text-gray-700">
                            <span>Subtotal</span>
                            <span class="font-medium">Rp. <span
                                    id="subtotal">{{ number_format($order->harga_produk, 0, ',', '.') }}</span></span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Bayar</span>
                            <span class="font-medium">
                                <input type="number" id="bayarInput" name="bayar" class="border rounded-lg p-2"
                                    value="0" min="0">
                            </span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Sisa yang harus dibayar</span>
                            <span class="font-medium">Rp. <span
                                    id="sisaBayar">{{ number_format($order->harga_produk, 0, ',', '.') }}</span></span>
                        </div>
                        <div class="flex justify-between text-xl font-semibold text-gray-900 border-t pt-4">
                            <span>Total Bayar</span>
                            <span>Rp <span
                                    id="totalBayar">{{ number_format($order->harga_produk, 0, ',', '.') }}</span></span>
                        </div>
                    </div>

                    <!-- Tombol Bayar -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="w-full mt-6 bg-green-600 text-white py-4 rounded-xl hover:bg-green-700 transition text-lg font-semibold flex items-center justify-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16">
                            </path>
                        </svg>
                        Check Out
                    </button>

                    <!-- Main modal -->
                    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-white">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-xl font-semibold dark:text-gray-900">
                                        Upload Bukti Transfer
                                    </h3>
                                    <button type="button"
                                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="authentication-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <div>
                                        <label for="bukti_tf"
                                            class="block mb-2 text-sm font-medium dark:text-gray-900">Bukti
                                            Transfer</label>
                                        <input type="file" name="bukti_tf" id="bukti_tf"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 dark:bg-white dark:border-white dark:placeholder-gray-400 dark:text-black"
                                            required />
                                    </div>
                                    <button type="submit"
                                        class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buy
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-green-700 text-white py-10 px-6 md:px-12
        <div
            class="max-w-6xl mx-auto flex
        flex-col md:flex-row justify-between items-center md:items-start text-center md:text-left gap-6">
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
                <a href="#" class="text-gray-200 hover:text-white"><i
                        class="fab fa-instagram text-2xl"></i></a>
                <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-youtube text-2xl"></i></a>
            </div>
        </div>
        </div>

        <div class="mt-6 text-center border-t border-gray-400 pt-4">
            <p class="text-sm">&copy; 2024 3D Video Store. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // METODE PEMBAYARAN
        document.getElementById("bankSelect").addEventListener("change", function() {
            let selectedOption = this.options[this.selectedIndex];

            // Ambil data dari atribut
            let bankName = selectedOption.getAttribute("data-nama_bank") || "-";
            let bankNumber = selectedOption.getAttribute("data-nomor_rekening") || "-";
            let bankHolder = selectedOption.getAttribute("data-atas_nama") || "-";

            // Tampilkan data di dalam elemen
            document.getElementById("bankName").textContent = bankName;
            document.getElementById("bankNumber").textContent = bankNumber;
            document.getElementById("bankHolder").textContent = bankHolder;
        });

        // SISA BAYAR
        document.getElementById("bayarInput").addEventListener("input", function() {
            let subtotal = parseInt(document.getElementById("subtotal").textContent.replace(/\./g, "")) || 0;
            let bayar = parseInt(this.value.replace(/\D/g, "")) || 0; // Hanya angka yang diperbolehkan
            let sisa = subtotal - bayar;

            // Pastikan sisa tidak negatif
            if (sisa < 0) {
                sisa = 0;
            }

            // Format angka dengan titik sebagai pemisah ribuan
            document.getElementById("sisaBayar").textContent = sisa.toLocaleString("id-ID");
            document.getElementById("totalBayar").textContent = bayar.toLocaleString("id-ID");
        });
    </script>
</body>

</html>
