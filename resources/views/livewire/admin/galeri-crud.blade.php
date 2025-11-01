<div class="p-6 bg-white dark:bg-gray-800 dark:text-white">
    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-semibold">Manajemen Galeri</h2>
        <button wire:click="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Galeri</button>
    </div>

    @if (session()->has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-3">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($galeri as $gallery)
        <div class="border rounded-lg p-3 shadow-2xl">
            <h3 class="font-bold">{{ $gallery->judul }}</h3>
            <p class="text-sm text-gray-600">Kategori: {{ $gallery->kategori->nama_kategori ?? '-' }}</p>

            <div class="grid grid-cols-3 gap-2 my-2">
                @foreach ($gallery->fotos ?? [] as $img)
                <img src="{{ asset('storage/'.$img) }}" class="rounded-md object-cover w-full h-24">
                @endforeach
            </div>

            <div class="flex justify-between mt-2">
                <button wire:click="openModal({{ $gallery->id }})" class="text-blue-500">Edit</button>
                <button wire:click="delete({{ $gallery->id }})" class="text-red-500">Hapus</button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    @if($isOpenModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-lg">
            <h2 class="text-lg font-semibold mb-3">{{ $isEditMode ? 'Edit Galeri' : 'Tambah Galeri' }}</h2>

            <form wire:submit.prevent="save" class="space-y-3">
                <div>
                    <label>Judul</label>
                    <input type="text" wire:model="judul" class="w-full border rounded p-2">
                    @error('judul') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label>Kategori</label>
                    <select wire:model="kategori_id" class="w-full border rounded p-2">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="">deskripsi</label>
                    <textarea name="deskripsi" cols="30" rows="4" wire:model="deskripsi"
                        class="w-full border rounded p-2"></textarea>
                </div>

                <!-- Old Images -->
                @if ($isEditMode && $oldFotos)
                <div>
                    <p class="font-semibold mb-1">Foto Lama:</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($oldFotos as $i => $img)
                        <div class="relative">
                            <img src="{{ asset('storage/'. $img) }}" class="w-20 h-20 object-cover rounded">
                            <button type="button" wire:click="removeImage({{ $i }})"
                                class="absolute top-0 right-0 bg-red-600 text-white text-xs px-1 rounded-full">x</button>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <div>
                    <label>Upload Gambar Baru</label>
                    <input type="file" wire:model="fotos" multiple class="w-full border rounded p-2">
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($fotos as $img)
                        <img src="{{ $img->temporaryUrl() }}" class="w-20 h-20 object-cover rounded">
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-400 text-white px-3 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded">
                        {{ $isEditMode ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>