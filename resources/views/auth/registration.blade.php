@extends('layouts.apps')
@section('content')
<section class="my-10 min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
    <div
        class="flex flex-col md:flex-row w-full max-w-5xl rounded-2xl shadow-lg overflow-hidden bg-white dark:bg-gray-800">

        {{-- Bagian kiri: Form Registrasi --}}
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                Buat Akun Baru ✨
            </h2>

            <form method="POST" action="{{ route('register.post') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama
                        Lengkap</label>
                    <input id="name" name="name" type="text" required autofocus class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 
                               bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>

                <div>
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                    <input id="email" name="email" type="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 
                               bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>

                <div>
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <input id="password" name="password" type="password" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 
                               bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>

                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Konfirmasi Password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 
                               bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>

                <button type="submit" class="w-full py-3 bg-green-800 hover:bg-green-400 text-white font-semibold rounded-lg 
                           transition duration-300 focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-500 hover:underline font-medium">Masuk di sini</a>
            </p>
        </div>

        {{-- Bagian kanan: Ilustrasi --}}
        <div class="hidden md:flex w-1/2 bg-indigo-600 dark:bg-indigo-700 items-center justify-center">
            <img src="{{ asset('assets/images/smp2_ok.webp')}}" alt="Register Illustration"
                class="w-3/4 h-[98vh] w-[99%] drop-shadow-lg">
        </div>

    </div>
</section>
@endsection