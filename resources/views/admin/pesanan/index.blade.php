@extends('admin.layout')

@section('content')
    <div class="p-4">
        @if (session('success'))
            <div id="alert-border-3"
                class="flex items-center p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-100"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path d="M18 10A8 8 0 1 1 2 10a8 8 0 0 1 16 0ZM9 5h2v6H9V5Zm0 8h2v2H9v-2Z" />
                </svg>
                <div>
                    <span class="font-medium">Sukses!</span> {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                    onclick="this.parentElement.remove()" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l12 12M13 1L1 13" />
                    </svg>
                </button>
            </div>
        @endif

        <!-- Tombol Tabs -->
        <div class="flex space-x-4 mb-4">
            <button onclick="showTab('pesanan-masuk', this)"
                class="tab-btn px-4 py-2 bg-transparent text-green-700 rounded-lg border-2 border-green-700
                hover:bg-green-700 hover:text-white transition-colors duration-300">
                Pesanan Masuk
            </button>
            <button onclick="showTab('proses', this)"
                class="tab-btn px-4 py-2 bg-transparent text-green-700 rounded-lg border-2 border-green-700
                hover:bg-green-700 hover:text-white transition-colors duration-300">
                Proses
            </button>
            <button onclick="showTab('selesai', this)"
                class="tab-btn px-4 py-2 bg-transparent text-green-700 rounded-lg border-2 border-green-700
                hover:bg-green-700 hover:text-white transition-colors duration-300">
                Selesai
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <div id="pesanan-masuk">
                <table id="myTable" class="w-full text-sm text-black dark:text-black">
                    <thead class="text-xs text-white uppercase bg-green-500 dark:bg-gray-700 dark:text-green-400">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-4">No</th>
                            <th scope="col" class="px-6 py-4">Invoice</th>
                            <th scope="col" class="px-6 py-4">Bukti Pembayaran</th>
                            <th scope="col" class="px-6 py-4">Nama Pemesan</th>
                            <th scope="col" class="px-6 py-4">Produk Yang Dipesan</th>
                            <th scope="col" class="px-6 py-4">Harga</th>
                            <th scope="col" class="px-6 py-4">DP / Bayar</th>
                            <th scope="col" class="px-6 py-4">Sisa Bayar</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                    </thead>

                    <!-- Pesanan Masuk -->
                    <tbody id="pesanan-masuk">
                        @foreach ($order_sudah_bayar as $o)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-5">{{ $loop->iteration }}</td>
                                <td class="px-6 py-5">{{ $o->id }}</td>
                                <td class="px-6 py-5">
                                    <img src="{{ asset('storage/' . $o->bukti_tf) }}" class="w-20 rounded-lg cursor-pointer"
                                        alt="Bukti Pembayaran"
                                        onclick="openModal('{{ asset('storage/' . $o->bukti_tf) }}')">
                                </td>
                                <td class="px-6 py-5">{{ $o->user->name }}</td>
                                <td class="px-6 py-5">{{ $o->produkVideo->nama_produk }}</td>
                                <td class="px-6 py-5">{{ $o->produkVideo->harga_produk }}</td>
                                <td class="px-6 py-5">{{ $o->bayar }}</td>
                                <td class="px-6 py-5">{{ $o->sisa_bayar }}</td>
                                <td class="px-6 py-5">{{ $o->status }}</td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-row space-x-0.5">
                                        <form action="{{ route('pesanan.proses', $o->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button
                                                class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                                                <i class="ri-check-fill text-xl"></i>
                                            </button>
                                        </form>
                                        <button
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                            <i class="ri-close-fill text-xl"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="proses" class="hidden">
                <table id="myTable1" class="w-full text-sm text-black dark:text-black">
                    <thead class="text-xs text-white uppercase bg-green-500 dark:bg-gray-700 dark:text-green-400">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-4">No</th>
                            <th scope="col" class="px-6 py-4">Invoice</th>
                            <th scope="col" class="px-6 py-4">Bukti Pembayaran</th>
                            <th scope="col" class="px-6 py-4">Nama Pemesan</th>
                            <th scope="col" class="px-6 py-4">Produk Yang Dipesan</th>
                            <th scope="col" class="px-6 py-4">Harga</th>
                            <th scope="col" class="px-6 py-4">DP / Bayar</th>
                            <th scope="col" class="px-6 py-4">Sisa Bayar</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                    </thead>

                    <!-- Proses -->
                    <tbody id="pesanan-masuk">
                        @foreach ($order_proses as $o)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-5">{{ $loop->iteration }}</td>
                                <td class="px-6 py-5">{{ $o->id }}</td>
                                <td class="px-6 py-5">
                                    <img src="{{ asset('storage/' . $o->bukti_tf) }}"
                                        class="w-20 rounded-lg cursor-pointer" alt="Bukti Pembayaran"
                                        onclick="openModal('{{ asset('storage/' . $o->bukti_tf) }}')">
                                </td>
                                <td class="px-6 py-5">{{ $o->user->name }}</td>
                                <td class="px-6 py-5">{{ $o->produkVideo->nama_produk }}</td>
                                <td class="px-6 py-5">{{ $o->produkVideo->harga_produk }}</td>
                                <td class="px-6 py-5">{{ $o->bayar }}</td>
                                <td class="px-6 py-5">{{ $o->sisa_bayar }}</td>
                                <td class="px-6 py-5">{{ $o->status }}</td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-row space-x-0.5">
                                        <form action="{{ route('pesanan.selesai', $o->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                                <i class="ri-check-double-fill text-xl"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('pesanan.invoice', $o->id) }}"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                                            <i class="ri-download-line text-xl"></i>
                                        </a>
                                        <button type="submit"
                                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                                            <i class="ri-send-plane-fill text-xl"></i>
                                        </button>
                                        <button type="submit"
                                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                            <i class="ri-whatsapp-line text-xl"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="selesai" class="hidden">
                <table id="myTable2" class="w-full text-sm text-black dark:text-black">
                    <thead class="text-xs text-white uppercase bg-green-500 dark:bg-gray-700 dark:text-green-400">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-4">No</th>
                            <th scope="col" class="px-6 py-4">Invoice</th>
                            <th scope="col" class="px-6 py-4">Bukti Pembayaran</th>
                            <th scope="col" class="px-6 py-4">Nama Pemesan</th>
                            <th scope="col" class="px-6 py-4">Produk Yang Dipesan</th>
                            <th scope="col" class="px-6 py-4">Harga</th>
                            <th scope="col" class="px-6 py-4">DP / Bayar</th>
                            <th scope="col" class="px-6 py-4">Sisa Bayar</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                        </tr>
                    </thead>

                    <!-- Selesai -->
                    <tbody id="pesanan-masuk">
                        @foreach ($order_selesai as $o)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-5">{{ $loop->iteration }}</td>
                                <td class="px-6 py-5">{{ $o->id }}</td>
                                <td class="px-6 py-5">
                                    <img src="{{ asset('storage/' . $o->bukti_tf) }}"
                                        class="w-20 rounded-lg cursor-pointer" alt="Bukti Pembayaran"
                                        onclick="openModal('{{ asset('storage/' . $o->bukti_tf) }}')">
                                </td>
                                <td class="px-6 py-5">{{ $o->user->name }}</td>
                                <td class="px-6 py-5">{{ $o->produkVideo->nama_produk }}</td>
                                <td class="px-6 py-5">{{ $o->produkVideo->harga_produk }}</td>
                                <td class="px-6 py-5">{{ $o->bayar }}</td>
                                <td class="px-6 py-5">{{ $o->sisa_bayar }}</td>
                                <td class="px-6 py-5">{{ $o->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="imageModal" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-gray-900/70">
            <div class="relative p-4 w-full max-w-2xl">
                <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex justify-between items-center p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Bukti Pembayaran</h3>
                        <button type="button" onclick="closeModal()"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            ✖
                        </button>
                    </div>
                    <div class="p-6 flex justify-center">
                        <img id="modalImage" class="max-w-full max-h-[400px] rounded-lg" src=""
                            alt="Bukti Pembayaran">
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showTab(tabId, element) {
                // Sembunyikan semua tab
                document.getElementById('pesanan-masuk').classList.add('hidden');
                document.getElementById('proses').classList.add('hidden');
                document.getElementById('selesai').classList.add('hidden');

                // Tampilkan tab yang dipilih
                document.getElementById(tabId).classList.remove('hidden');

                // Hapus class active dari semua tombol
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('bg-green-700', 'text-white');
                    btn.classList.add('bg-transparent', 'text-green-700');
                });

                // Tambahkan class active pada tombol yang diklik
                element.classList.add('bg-green-700', 'text-white');
                element.classList.remove('bg-transparent', 'text-green-700');
            }

            // Setel tombol pertama sebagai aktif saat halaman dimuat
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector(".tab-btn").click();
            });
        </script>

        <script>
            function openModal(imageSrc) {
                document.getElementById("modalImage").src = imageSrc;
                document.getElementById("imageModal").classList.remove("hidden");
            }

            function closeModal() {
                document.getElementById("imageModal").classList.add("hidden");
            }
        </script>
    @endsection
