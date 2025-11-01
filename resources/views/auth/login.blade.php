@extends('layouts.apps')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
    <div
        class="flex flex-col md:flex-row w-full max-w-5xl rounded-2xl shadow-lg overflow-hidden bg-white dark:bg-gray-800">

        {{-- Bagian kiri: Form Login --}}
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                Selamat Datang Kembali 👋
            </h2>

            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                    <input id="email" name="email" type="email" required autofocus class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 
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

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                        <input type="checkbox" name="remember"
                            class="mr-2 rounded text-indigo-500 focus:ring-indigo-400">
                        Ingat saya
                    </label>
                    <a href="{{ url('password.request') }}" class="text-sm text-indigo-500 hover:underline">
                        Lupa password?
                    </a>
                </div>

                <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg 
                           transition duration-300 focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                    Masuk
                </button>
            </form>

            <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-indigo-500 hover:underline font-medium">Daftar
                    Sekarang</a>
            </p>
        </div>

        {{-- Bagian kanan: Ilustrasi --}}
        <div class="hidden md:flex w-1/2 bg-indigo-600 dark:bg-indigo-700 items-center justify-center">
            <img src="{{ asset('assets/images/login.webp') }}" alt="Login Illustration"
                class="w-3/4 h-[98vh] w-[99%] drop-shadow-lg">
        </div>

    </div>
</section>
@endsection