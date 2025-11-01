@extends('layouts.depan')

@section('content')
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-6 mt-[10vh]">
        <h1 class="text-4xl font-bold text-center mb-12 text-gray-800 dark:text-white">
            Hubungi Kami
        </h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <!-- === KIRI: FORM KONTAK === -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">
                    Kirim Pesan Anda
                </h2>

                <form action="{{ url('contact.send') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Nama Lengkap
                        </label>
                        <input type="text" name="name" id="name" required
                            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Email
                        </label>
                        <input type="email" name="email" id="email" required
                            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Subjek
                        </label>
                        <input type="text" name="subject" id="subject"
                            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Pesan
                        </label>
                        <textarea name="message" id="message" rows="5" required
                            class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition-colors duration-300">
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- === KANAN: GOOGLE MAPS === -->
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <iframe class="w-full h-[500px] rounded-2xl"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.2347898962744!2d110.40441117598653!3d-7.187977071357863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f37b64c7c87b%3A0x5a73b872f4a9c274!2sSMK%20Texmaco%20Semarang!5e0!3m2!1sid!2sid!4v1727700000000!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection