<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Login | TR Express</title>
</head>

<body>
    <section
        class="bg-gradient-to-r from-green-600 via-green-500 to-green-500 min-h-screen flex items-center justify-center">
        <div class="bg-white flex rounded-2xl shadow-lg overflow-hidden w-full md:w-3/4 lg:w-2/3 xl:w-1/2">
            <!-- Left Content -->
            <div
                class="hidden md:flex w-1/2 bg-gradient-to-br from-green-500 to-green-700 items-center justify-center relative overflow-hidden rounded-2xl p-10">
                <img src="{{ asset('assets/images/LOGO.png') }}" alt="Logo"
                    class="absolute top-44 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-[70%] z-10">

                <div class="mt-72 text-white text-center px-4">
                    Kami menyediakan layanan pembuatan dan penjualan video 3D berkualitas tinggi untuk berbagai
                    keperluan, seperti promosi, animasi karakter, presentasi bisnis, dan konten media sosial. Dengan
                    teknologi canggih, kami menghasilkan video yang realistis dan menarik sesuai kebutuhan pelanggan.
                </div>
            </div>

            <!-- Right Content -->
            <div class="w-full md:w-1/2 p-8 md:p-12">
                <h2 class="text-3xl md:text-4xl font-bold text-green-500">REGISTER!</h2>
                <p class="text-sm text-gray-600 mt-2">Isi data anda dengan lengkap.</p>

                <!-- Pesan Error -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mt-4">
                        @foreach ($errors->all() as $error)
                            <p class="text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Pesan Sukses -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mt-4">
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('register.store') }}" method="POST" class="flex flex-col gap-4 mt-6">
                    @csrf
                    <div>
                        <label for="nama" class="text-sm text-gray-500">Nama Lengkap</label>
                        <input type="nama" name="nama" value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap Anda"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="no_hp" class="text-sm text-gray-500">No HP</label>
                        <input type="number" name="no_hp" value="{{ old('no_hp') }}"
                            placeholder="Masukkan email Anda"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="email" class="text-sm text-gray-500">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="Masukkan email Anda"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="password" class="text-sm text-gray-500">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Masukkan password Anda"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <div class="mt-2 flex items-center">
                                <input type="checkbox" id="show-password" class="mr-2">
                                <label for="show-password" class="text-sm text-gray-600">Tampilkan Password</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-green-500 text-white py-3 mt-4 rounded-lg hover:bg-green-600 transition duration-300">
                        Regsiter
                    </button>
                </form>
                <p class="mt-4 text-sm text-gray-600">
                    Silahkan login jika sudah punya akun
                    <a href="{{ route('login') }}" class="text-green-500 font-medium hover:underline">Login
                        sekarang</a>
                </p>
            </div>
        </div>
    </section>

    <script>
        const showPasswordCheckbox = document.getElementById('show-password');
        const passwordField = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function() {
            passwordField.type = showPasswordCheckbox.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>
