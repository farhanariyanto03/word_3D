@extends('admin.layout')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white/10 backdrop-blur-lg border border-white/30 shadow-2xl rounded-2xl p-8 max-w-lg w-full">
            <h2 class="text-3xl font-bold text-black text-center mb-6">
                {{ $edit_norek ? 'Edit Nomor Rekening' : 'Tambah Nomor Rekening' }}
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
                action="{{ $edit_norek ? route('nomor-rekening.update', Crypt::encrypt($edit_norek->id)) : route('nomor-rekening.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if ($edit_norek)
                    @method('PUT')
                @endif

                <div>
                    <label for="nama_bank" class="block text-sm font-medium text-black">Nama Bank</label>
                    <input type="text" id="nama_bank" name="nama_bank"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60"
                        placeholder="Masukkan nama produk" value="{{ old('nama_bank', $edit_norek->nama_bank ?? '') }}"
                        required />
                </div>

                <div>
                    <label for="nomor_rekening" class="block text-sm font-medium text-black">Nomor Rekening</label>
                    <input type="number" id="nomor_rekening" name="nomor_rekening"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60"
                        placeholder="Masukkan harga produk"
                        value="{{ old('harga_produk', $edit_norek->nomor_rekening ?? '') }}" required />
                </div>

                <div>
                    <label for="atas_nama" class="block text-sm font-medium text-black">Atas Nama</label>
                    <input type="text" id="harga_produk" name="atas_nama"
                        class="mt-2 w-full p-3 bg-white/20 border border-white/30 text-black rounded-xl shadow-sm focus:ring-purple-400 focus:border-purple-400 placeholder-white/60"
                        placeholder="Masukkan harga produk"
                        value="{{ old('atas_nama', $edit_norek->atas_nama ?? '') }}" required />
                </div>

                <button type="submit"
                    class="w-full py-3 text-white font-semibold {{ $edit_norek ? 'bg-green-600 hover:bg-green-700' : 'bg-blue-700 hover:bg-blue-800' }} rounded-xl shadow-lg
                        focus:ring-4 focus:ring-blue-300 transition-all duration-300 ease-in-out transform hover:scale-105">
                    {{ $edit_norek ? 'Update Norek' : 'Tambah Norek' }}
                </button>
            </form>

        </div>
    </div>
@endsection
