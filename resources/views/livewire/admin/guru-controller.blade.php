<div>
    <div class="p-6 bg-white dark:bg-gray-800 dark:text-white">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-semibold">Manajemen Guru</h2>
            <button wire:click="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Guru</button>
        </div>

        @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-3">
            {{ session('success') }}
        </div>
        @endif

        <table class="min-w-full bg-white dark:bg-gray-700 border border-gray-200 shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr>
                    <th class="border px-2 py-1">No</th>
                    <th class="border px-2 py-1">Nama Lengkap</th>
                    <th class="border px-2 py-1">NIP</th>
                    <th class="border px-2 py-1">Jabatan</th>
                    <th class="border px-2 py-1">Foto</th>
                    <th class="border px-2 py-1">Aksi</th>
                </tr>
                </trhead>
            <tbody>
                @foreach ($gurus as $index => $guru)
                <tr>
                    <td class="border px-2 py-1">{{ $index + 1 }}</td>
                    <td class="border px-2 py-1">{{ $guru->nama_lengkap }}</td>
                    <td class="border px-2 py-1">{{ $guru->nip }}</td>
                    <td class="border px-2 py-1">{{ $guru->jabatan }}</td>
                    <td class="border px-2 py-1">
                        @if($guru->foto)
                        <img src="{{ asset('storage/' . $guru->foto) }}" class="w-16 h-16 object-cover rounded"
                            alt="Foto Guru">
                        @else
                        <span>No Image</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $guru->id }})" class="text-blue-500 mr-2">Edit</button>
                        <button wire:click="delete({{ $guru->id }})"
                            onclick="if(!confirm('Yakin ingin menghapus guru ini?')) { event.stopImmediatePropagation(); }"
                            class="text-red-500">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Modal -->
        @if($isModalOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
            <div class="bg-white p-6 rounded-lg w-full max-w-lg">
                <h2 class="text-lg font-semibold mb-3">{{ $guru_id ? 'Edit Guru' : 'Tambah Data Guru' }}</h2>

                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" wire:model="nama_lengkap" class="w-full border rounded p-2">
                        @error('nama_lengkap') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Nip</label>
                        <input type="text" wire:model="nip" class="w-full border rounded p-2">
                        @error('nip') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Jabatan</label>
                        <select wire:model="jabatan" class="w-full border rounded p-2">
                            <option value="">-- Pilih jabatan --</option>
                            <option value="guru">Guru</option>
                            <option value="kepala_sekolah">Kepala Sekolah</option>
                            <option value="wakil_kepala_sekolah">Wakil Kepala Sekolah</option>
                            <option value="staff_pengajar">Staff Pengajar</option>
                            <option value="waka">Waka</option>
                        </select>
                        @error('jabatan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Old Images -->
                    @if ($old_foto)
                    <div class="mb-3">
                        <p class="font-semibold mb-1">Foto Lama:</p>
                        <div class="flex flex-wrap gap-2">
                            <div class="relative">
                                <img src="{{ asset('storage/'. $old_foto) }}" class="w-20 h-20 object-cover rounded">
                                <button type="button" wire:click="removeImage"
                                    class="absolute top-0 right-0 bg-red-600 text-white text-xs px-1 rounded-full">x</button>
                            </div>

                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label>Upload Gambar Baru</label>
                        <input type="file" wire:model="foto" class="w-full border rounded p-2">
                        <div class="flex flex-wrap gap-2 mt-2">
                            @if($foto)
                            <img src="{{ $foto->temporaryUrl() }}" class="w-20 h-20 object-cover rounded">
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="closeModal"
                            class="bg-gray-400 text-white px-3 py-2 rounded">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>