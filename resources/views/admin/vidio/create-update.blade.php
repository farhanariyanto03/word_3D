@extends('admin.layout')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-600">
        <div class="bg-white/10 backdrop-blur-lg border border-white/30 shadow-2xl rounded-2xl p-8 max-w-lg w-full">
            <h2 class="text-3xl font-bold text-black text-center mb-6">
                {{ $edit_vidio ? 'Edit Produk' : 'Tambah Produk' }}
            </h2>

            @if ($errors->any())
                <div id="alert-border-2"
                    class="flex items-center p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-100" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path d="M18 10A8 8 0 1 1 2 10a8 8 0 0 1 16 0ZM9 5h2v6H9V5Zm0 8h2v2H9v-2Z" />
                    </svg>
                    <div>
                        <span class="font-medium">Terjadi Kesalahan:</span>
                        <ul class="mt-1.5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
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

            <form class="space-y-5"
                action="{{ $edit_vidio ? route('vidio.update', Crypt::encrypt($edit_vidio->id)) : route('vidio.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if ($edit_vidio)
                    @method('PUT')
                @endif

                <div>
                    <label for="nama_produk" class="block text-sm font-medium text-black">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60"
                        placeholder="Masukkan nama produk" value="{{ old('nama_produk', $edit_vidio->nama_produk ?? '') }}"
                        required />
                </div>

                <div>
                    <label for="gambar_produk" class="block text-sm font-medium text-black">Gambar Produk</label>
                    <input type="file" id="gambar_produk" name="gambar_produk"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60" />
                    @if ($edit_vidio && $edit_vidio->gambar_produk)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $edit_vidio->gambar_produk) }}" alt="Gambar Produk"
                                class="w-40 h-40 object-cover rounded-lg border border-gray-300">
                        </div>
                    @endif
                </div>

                <div>
                    <label for="harga_produk" class="block text-sm font-medium text-black">Harga Produk</label>
                    <input type="number" id="harga_produk" name="harga_produk"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60"
                        placeholder="Masukkan harga produk"
                        value="{{ old('harga_produk', $edit_vidio->harga_produk ?? '') }}" required />
                </div>

                <div>
                    <label for="minimal_dp" class="block text-sm font-medium text-black">Minimal DP</label>
                    <input type="number" id="minimal_dp" name="minimal_dp"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60"
                        placeholder="Masukkan minimal DP" value="{{ old('minimal_dp', $edit_vidio->minimal_dp ?? '') }}"
                        required />
                </div>

                <div>
                    <label for="deskripsi_produk" class="block text-sm font-medium text-black">Deskripsi Produk</label>
                    <textarea id="deskripsi_produk" rows="4" name="deskripsi_produk"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60">{{ old('deskripsi_produk', $edit_vidio->deskripsi_produk ?? '') }}</textarea>
                </div>

                <div>
                    <label for="syarat_ketentuan" class="block text-sm font-medium text-black">Syarat & Ketentuan</label>
                    <textarea id="syarat_ketentuan" rows="4" name="syarat_ketentuan"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60">{{ old('syarat_ketentuan', $edit_vidio->syarat_ketentuan ?? '') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full py-3 text-white font-semibold {{ $edit_vidio ? 'bg-green-600 hover:bg-green-700' : 'bg-blue-700 hover:bg-blue-800' }} rounded-xl shadow-lg
                        focus:ring-4 focus:ring-blue-300 transition-all duration-300 ease-in-out transform hover:scale-105">
                    {{ $edit_vidio ? 'Update Produk' : 'Tambah Produk' }}
                </button>
            </form>

        </div>
    </div>
@endsection
