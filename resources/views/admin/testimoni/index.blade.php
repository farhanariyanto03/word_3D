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

        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <table id="myTable" class="w-full text-sm text-black dark:text-black">
                <thead class="text-xs text-white uppercase bg-green-500 dark:bg-gray-700 dark:text-green-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-4">No</th>
                        <th scope="col" class="px-6 py-4">Nama Customer</th>
                        <th scope="col" class="px-6 py-4">Rating</th>
                        <th scope="col" class="px-6 py-4">Testimoni</th>
                        <th scope="col" class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimoni as $t)
                        <tr class="bg-white dark:bg-gray-800 border-b hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td
                                class="px-6 py-5 font-medium text-gray-900 dark:text-white whitespace-nowrap leading-relaxed">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-5 leading-relaxed">{{ $t->user->nama }}</td>
                            <td class="px-6 py-5 leading-relaxed">{{ $t->rating }}</td>
                            <td class="px-6 py-5 leading-relaxed">{{ $t->testimoni }}</td>
                            <td class="px-6 py-5 leading-relaxed flex flex-row space-x-1">
                                <form action="{{ route('testimoni.destroy', Crypt::encrypt($t->id)) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-3 text-white bg-red-700 rounded-lg hover:bg-red-600"
                                        type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
