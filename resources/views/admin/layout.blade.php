<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                        <img src="{{ asset('assets/images/LOGO.png') }}" class="h-10 me-3" alt="FlowBite Logo" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    ADMIN
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-green-500 dark:hover:bg-green-200 group
                            {{ request()->is('admin') ? 'bg-green-500 dark:bg-green-800 text-white' : 'text-gray-900' }}">
                        <i class="ri-dashboard-line text-3xl"></i>
                        <span class="ms-3 font-semibold">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('vidio.index') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-green-500 dark:hover:bg-green-200 group
                            {{ request()->routeIs('vidio.index') ? 'bg-green-500 dark:bg-green-800 text-white' : 'text-gray-900' }}">
                        <i class="ri-file-video-line text-3xl"></i>
                        <span class="ms-3 font-semibold">Vidio</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('nomor-rekening.index') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-green-500 dark:hover:bg-green-200 group
                            {{ request()->routeIs('nomor-rekening.index') ? 'bg-green-500 dark:bg-green-800 text-white' : 'text-gray-900' }}">
                        <i class="ri-bank-card-line text-3xl"></i>
                        <span class="ms-3 font-semibold">Nomor Rekening</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('pesanan.index') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white hover:bg-green-500 dark:hover:bg-green-200 group
                            {{ request()->routeIs('pesanan.index') ? 'bg-green-500 dark:bg-green-800 text-white' : 'text-gray-900' }}">
                        <i class="ri-shopping-cart-line text-3xl"></i>
                        <span class="ms-3 font-semibold">Pesanan Produk</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#myTable', {
            info: false,
        });
        new DataTable('#myTable1', {
            info: false,
        });
        new DataTable('#myTable2', {
            info: false,
        });
    </script>
</body>

</html>
