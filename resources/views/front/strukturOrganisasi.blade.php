@extends('layouts.depan')
@section('title', 'Struktur Organisasi')
@section('content')

<div class="min-h-screen mt-[8%] bg-white ">
    <section class="max-w-7xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center mb-10">
            Struktur Organisasi SMP Negeri 2 Gringsing
        </h2>

        <!-- Kepala Sekolah -->
        <div class="flex flex-col items-center mb-12">
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center w-64">
                <img src="kepsek.jpg" alt="Kepala Sekolah"
                    class="w-24 h-24 mx-auto rounded-full object-cover border-4 border-blue-500" />
                <h3 class="mt-4 font-semibold text-lg">Drs. H. Ahmad Syafii, M.Pd</h3>
                <p class="text-sm text-gray-500">Kepala Sekolah</p>
            </div>
            <div class="w-1 h-12 bg-blue-500"></div>
        </div>

        <!-- Wakil Kepala Sekolah -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 justify-center mb-12">
            <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                <img src="waka_kurikulum.jpg" alt="Waka Kurikulum"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-indigo-400" />
                <h4 class="mt-3 font-semibold">Siti Rahmawati, S.Pd</h4>
                <p class="text-sm text-gray-500">Waka Kurikulum</p>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                <img src="waka_kesiswaan.jpg" alt="Waka Kesiswaan"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-indigo-400" />
                <h4 class="mt-3 font-semibold">Agus Setiawan, S.Pd</h4>
                <p class="text-sm text-gray-500">Waka Kesiswaan</p>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                <img src="waka_sarpras.jpg" alt="Waka Sarpras"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-indigo-400" />
                <h4 class="mt-3 font-semibold">Nurhadi, S.Kom</h4>
                <p class="text-sm text-gray-500">Waka Sarana & Prasarana</p>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                <img src="waka_humas.jpg" alt="Waka Humas"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-indigo-400" />
                <h4 class="mt-3 font-semibold">Dewi Lestari, S.Pd</h4>
                <p class="text-sm text-gray-500">Waka Humas</p>
            </div>
        </div>

        <!-- Garis Penghubung -->
        <div class="flex justify-center">
            <div class="w-1 h-10 bg-blue-500"></div>
        </div>

        <!-- Bagian Bawah (Koordinator, Guru, OSIS) -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10">
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold">Koordinator Ekstrakurikuler</h4>
                <p class="text-sm text-gray-500">Budi Santoso, S.Pd</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold">Koordinator BK</h4>
                <p class="text-sm text-gray-500">Lina Marlina, S.Psi</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold">Koordinator Laboratorium</h4>
                <p class="text-sm text-gray-500">Fajar Ramadhan, S.Kom</p>
            </div>
            <div class="bg-white rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold">Ketua OSIS</h4>
                <p class="text-sm text-gray-500">Nabila Putri Rahma</p>
            </div>
        </div>
    </section>
</div>
@endsection