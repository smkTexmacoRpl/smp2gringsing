@extends('layouts.depan')
@section('title', 'Struktur Organisasi')
@section('styles')
<style>
    /* ===== Enhanced Styling ===== */

    /* Different background color per level */
    .level-root {
        background-color: #ecc5c5;
    }

    /* rose-50 */
    .level-1 {
        background-color: #bacfeb;
    }

    /* blue-50 */
    .level-2 {
        background-color: #bbe6c8;
    }

    /* green-50 */

    /* hover effect */
    .card {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .card:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 12px 22px rgba(0, 0, 0, 0.12);
        z-index: 3;
        background-color: #b8ceeb;
    }

    /* connectors same as before */
    .org-node {
        display: grid;
        place-items: start center;
        position: relative;
    }

    .children-row {
        display: flex;
        gap: 1.25rem;
        justify-content: center;
        margin-top: 1.25rem;
        position: relative;
    }

    .org-node>.card::after {
        content: "";
        position: absolute;
        left: 50%;
        top: calc(100% + 0.375rem);
        width: 2px;
        height: 1.25rem;
        background: rgba(31, 32, 34, 0.6);
        transform: translateX(-50%);
    }

    .children-row::before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        height: 2px;
        background: rgba(30, 31, 32, 0.3);
        transform: translateY(-0.625rem);
    }

    .child .card::before {
        content: "";
        position: absolute;
        top: -1.25rem;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 1.25rem;
        background: rgba(156, 163, 175, 0.6);
    }

    /* mobile adjustments */
    @media (max-width: 768px) {

        .children-row::before,
        .org-node>.card::after,
        .child .card::before {
            display: none;
        }

        .children-row {
            flex-direction: column;
            gap: 0.75rem;
            margin-top: 0.5rem;
        }

        .card div {
            font-size: 1.125rem;
        }

        /* text-lg */
        .card .text-xs {
            font-size: 0.875rem;
        }

        /* text-sm */
    }

    .avatar {
        width: 70px;
        height: 70px;
        border-radius: 9999px;
        object-fit: cover;
    }

    .card:focus {
        outline: 3px solid rgba(59, 130, 246, 0.25);
        outline-offset: 2px;
    }
</style>
@endsection
@section('content')


{{-- <div class="min-h-screen mt-[8%] bg-white ">
    <section class="max-w-7xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center mb-10">
            Struktur Organisasi SMP Negeri 2 Gringsing
        </h2>

        <!-- Kepala Sekolah -->
        <div class="flex flex-col items-center mb-12">
            <div class="bg-card rounded-2xl shadow-lg p-6 text-center w-64">
                <img src="{{ url('https://images.unsplash.com/photo-1635521190724-d8d8abff50f4?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}"
                    alt="Kepala Sekolah" class="w-24 h-24 mx-auto rounded-full object-cover border-4 border-blue-500" />
                <h3 class="mt-4 font-semibold text-lg">Drs. H. Ahmad Syafii, M.Pd</h3>
                <p class="text-sm text-gray-500">Kepala Sekolah</p>
            </div>
            <div class="w-1 h-12 bg-black"></div>
        </div>

        <!-- Wakil Kepala Sekolah -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 justify-center mb-12">
            <div class="bg-card rounded-2xl shadow-md p-6 text-center">
                <img src="waka_kurikulum.jpg" alt="Waka Kurikulum"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-indigo-400" />
                <h4 class="mt-3 font-semibold">Siti Rahmawati, S.Pd</h4>
                <p class="text-sm text-gray-500">Waka Kurikulum</p>
            </div>
            <div class="bg-card rounded-2xl shadow-md p-6 text-center">
                <img src="waka_kesiswaan.jpg" alt="Waka Kesiswaan"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-indigo-400" />
                <h4 class="mt-3 font-semibold">Agus Setiawan, S.Pd</h4>
                <p class="text-sm text-gray-500">Waka Kesiswaan</p>
            </div>
            <div class="bg-card rounded-2xl shadow-md p-6 text-center">
                <img src="waka_sarpras.jpg" alt="Waka Sarpras"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-indigo-400" />
                <h4 class="mt-3 font-semibold">Nurhadi, S.Kom</h4>
                <p class="text-sm text-gray-500">Waka Sarana & Prasarana</p>
            </div>
            <div class="bg-card rounded-2xl shadow-md p-6 text-center">
                <img src="waka_humas.jpg" alt="Waka Humas"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-indigo-400" />
                <h4 class="mt-3 font-semibold">Dewi Lestari, S.Pd</h4>
                <p class="text-sm text-gray-500">Waka Humas</p>
            </div>
        </div>

        <!-- Garis Penghubung -->
        <div class="flex justify-center">
            <div class="w-1 h-10 bg-black "></div>
        </div>

        <!-- Bagian Bawah (Koordinator, Guru, OSIS) -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10">
            <div class="bg-card rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold">Koordinator Ekstrakurikuler</h4>
                <p class="text-sm text-gray-500">Budi Santoso, S.Pd</p>
            </div>
            <div class="bg-card rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold">Koordinator BK</h4>
                <p class="text-sm text-gray-500">Lina Marlina, S.Psi</p>
            </div>
            <div class="bg-card rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold">Koordinator Laboratorium</h4>
                <p class="text-sm text-gray-500">Fajar Ramadhan, S.Kom</p>
            </div>
            <div class="bg-card rounded-xl shadow p-4 text-center">
                <h4 class="font-semibold">Ketua OSIS</h4>
                <p class="text-sm text-gray-500">Nabila Putri Rahma</p>
            </div>
        </div>
    </section>
</div> --}}

<!-- Tailwind CDN (for quick demo) -->




<main class="mt-[5%] min-h-screen p-6 md:p-12">
    <section class="max-w-6xl mx-auto">
        <header class="mb-8 text-center">
            <h1 class="text-2xl md:text-3xl font-semibold">
                Struktur Organisasi SMP Negeri 2 Gringsing
            </h1>
            <p class="text-sm text-slate-600 mt-2">
                Struktur organisasi SMP Negeri 2 Gringsing yang menggambarkan hubungan dan hierarki antar anggota.
            </p>
        </header>

        <!-- Root of tree -->
        <div class="org-tree bg-white p-6 rounded-2xl shadow-sm">
            <div class="org-node">
                <div tabindex="0"
                    class="card level-root relative rounded-lg p-4 flex items-center gap-4 border border-black-400 shadow-sm">
                    <img class="avatar" src="{{ asset('assets/images/user-hijab.png') }}"
                        alt="Avatar Kepala Organisasi" />
                    <div>
                        <div class="font-semibold text-2xl">Siti Khomariyah, M.Pd.</div>
                        <div class="text-xl text-black-300">Kepala Sekolah</div>
                    </div>
                </div>

                <!-- level 1 children -->
                <div class="children-row mt-6 w-full">
                    <div class="child org-node w-1/3 min-w-[200px]">
                        <div tabindex="0"
                            class="card level-1 relative rounded-lg p-4 flex items-center gap-3 border border-slate-200 shadow-sm">
                            <img class="avatar" src="{{ asset('assets/images/user-icon.svg') }}" alt="Avatar Wakil" />
                            <div>
                                <div class="font-semibold text-2xl"></div>
                                <div class="text-xl text-slate-500">Wakil Kepala</div>
                            </div>
                        </div>

                        <!-- level 2 children of this node -->
                        <div class="children-row mt-6">
                            <div class="child org-node w-40">
                                <div tabindex="0"
                                    class="card relative bg-white rounded-lg p-3 text-center border border-slate-200 shadow-sm">
                                    <img class="avatar mx-auto" src="{{ asset('assets/images/user-icon.svg') }}"
                                        alt="Avatar Kurikulum" />
                                    <div class="mt-2 text-sm font-medium"></div>
                                    <div class="text-xs text-slate-500">Kurikulum</div>
                                </div>
                            </div>

                            <div class="child org-node w-40">
                                <div tabindex="0"
                                    class="card relative bg-white rounded-lg p-3 text-center border border-slate-200 shadow-sm bg-red-500">
                                    <img class="avatar mx-auto" src="{{ asset('assets/images/user-icon.svg') }}"
                                        alt="Avatar Kesiswaan" />
                                    <div class="mt-2 text-sm font-medium"></div>
                                    <div class="text-xs text-slate-500">Kesiswaan</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="child org-node w-1/3 min-w-[200px]">
                        <div tabindex="0"
                            class="card level-1 relative rounded-lg p-4 flex items-center gap-3 border border-slate-200 shadow-sm">
                            <img class="avatar" src="{{ asset('assets/images/user-icon.svg') }}"
                                alt="Avatar Keuangan" />
                            <div>
                                <div class="font-semibold"></div>
                                <div class="text-xs text-slate-500">Keuangan</div>
                            </div>
                        </div>

                        <div class="children-row mt-6">
                            <div class="child org-node w-40">
                                <div tabindex="0"
                                    class="card relative bg-white rounded-lg p-3 text-center border border-slate-200 shadow-sm">
                                    <img class="avatar mx-auto" src="{{ asset('assets/images/user-icon.svg') }}"
                                        alt="Bendahara" />
                                    <div class="mt-2 text-sm font-medium">Tegar</div>
                                    <div class="text-xs text-slate-500">Bendahara</div>
                                </div>
                            </div>

                            <div class="child org-node w-40">
                                <div tabindex="0"
                                    class="card relative bg-white rounded-lg p-3 text-center border border-slate-200 shadow-sm">
                                    <img class="avatar mx-auto" src="{{ asset('assets/images/user-icon.svg') }}"
                                        alt="Adm" />
                                    <div class="mt-2 text-sm font-medium">Yuni</div>
                                    <div class="text-xs text-slate-500">Administrasi</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="child org-node w-1/3 min-w-[200px]">
                        <div tabindex="0"
                            class="card level-1 relative  rounded-lg p-4 flex items-center gap-3 border border-slate-200 shadow-sm">
                            <img class="avatar" src="{{ asset('assets/images/user-icon.svg') }}" alt="Avatar Humas" />
                            <div>
                                <div class="font-semibold">Fajar Pratama</div>
                                <div class="text-xs text-slate-500">Humas & IT</div>
                            </div>
                        </div>

                        <div class="children-row mt-6">
                            <div class="child org-node w-40">
                                <div tabindex="0"
                                    class="card relative bg-white rounded-lg p-3 text-center border border-slate-200 shadow-sm">
                                    <img class="avatar mx-auto" src="{{ asset('assets/images/user-hijab.png') }}"
                                        alt="Media" />
                                    <div class="mt-2 text-sm font-medium">Ika</div>
                                    <div class="text-xs text-slate-500">Media</div>
                                </div>
                            </div>

                            <div class="child org-node w-40">
                                <div tabindex="0"
                                    class="card relative bg-white rounded-lg p-3 text-center border border-slate-200 shadow-sm">
                                    <img class="avatar mx-auto" src="{{ asset('assets/images/user-icon.svg') }}"
                                        alt="IT Support" />
                                    <div class="mt-2 text-sm font-medium">Anton</div>
                                    <div class="text-xs text-slate-500">IT Support</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.children-row level 1 -->
            </div>
            <!-- /.org-node root -->
        </div>
        <!-- /.org-tree -->

        <footer class="mt-6 text-sm text-slate-500">
            Tips: Ganti konten <code>img src</code> dan nama pada tiap node untuk
            membuatnya dinamis. Untuk data besar, hasilkan HTML ini dari loop di
            backend atau gunakan JS untuk render.
        </footer>
    </section>
</main>


@endsection