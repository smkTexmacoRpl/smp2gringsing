<div class="p-6">
    <div
        class="bg-white p-6 border-b dark:border-gray-700 flex flex-col md:flex-row justify-between items-start md:items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 md:mb-0">manajemen tag</h2>
        <div class="flex space-x-2">
            <x-cari />
            <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Tag
            </button>
        </div>
    </div>

    {{-- Notifikasi --}}

    @if (session()->has('message'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-3">
        {{ session('message') }}
    </div>
    @endif

    <table class="bg-white dark:bg-gray-800 min-w-full border border-gray-300 shadow-sm rounded-lg">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Slug</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tags as $index => $tag)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $tag->name }}</td>
                <td class="border px-4 py-2">{{ $tag->slug }}</td>
                <td class="border px-4 py-2">
                    <button wire:click="edit({{ $tag->id }})"
                        class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                    <button wire:click="delete({{ $tag->id }})" class="bg-red-600 text-white px-2 py-1 rounded"
                        onclick="return confirm('Yakin hapus tag ini?')">Hapus</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center p-4">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">{{ $tags->links() }}</div>

    {{-- Modal --}}
    @if ($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg w-1/3 p-6">
            <h2 class="text-lg font-bold mb-4">
                {{ $tagId ? 'Edit Tag' : 'Tambah Tag' }}
            </h2>

            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Nama Tag</label>
                    <input type="text" wire:model="name"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>