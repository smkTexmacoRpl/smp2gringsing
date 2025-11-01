< <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg w-1/3 p-6">
        <h2 class="text-lg font-bold mb-4">
            {{ $kategoriId ? 'Edit Kategori' : 'Tambah Kategori' }}
        </h2>

        <form wire:submit.prevent="store">
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nama Kategori</label>
                <input type="text" wire:model="nama_kategori"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                @error('nama_kategori') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" wire:click="closeModal"
                    class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
    </div>