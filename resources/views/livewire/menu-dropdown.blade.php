<div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">Manajemen Menu</h2>
        <button wire:click="create" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Menu</button>
    </div>

    @if (session()->has('message'))
    <div class="p-2 mb-3 bg-green-200 text-green-800 rounded">
        {{ session('message') }}
    </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">URL</th>
                <th class="p-2 border">Parent</th>
                <th class="p-2 border">Urutan</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td class="p-2 border font-bold">{{ $menu->nama }}</td>
                <td class="p-2 border">{{ $menu->url }}</td>
                <td class="p-2 border">-</td>
                <td class="p-2 border">{{ $menu->urutan }}</td>
                <td class="p-2 border">
                    <button wire:click="edit({{ $menu->id }})"
                        class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</button>
                    <button wire:click="delete({{ $menu->id }})"
                        class="px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
                </td>
            </tr>
            @foreach($menu->children as $child)
            <tr>
                <td class="p-2 border pl-8">↳ {{ $child->nama }}</td>
                <td class="p-2 border">{{ $child->url }}</td>
                <td class="p-2 border">{{ $menu->nama }}</td>
                <td class="p-2 border">{{ $child->urutan }}</td>
                <td class="p-2 border">
                    <button wire:click="edit({{ $child->id }})"
                        class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</button>
                    <button wire:click="delete({{ $child->id }})"
                        class="px-2 py-1 bg-red-600 text-white rounded">Hapus</button>
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>

    {{ $menus->links() }}


    <!-- Modal -->
    @if($isModalOpen)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40">
        <div class="bg-white p-6 rounded-lg w-1/3">
            <h2 class="text-lg font-bold mb-4">{{ $menuId ? 'Edit Menu' : 'Tambah Menu' }}</h2>
            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" wire:model="nama" class="w-full border rounded p-2">
                    @error('nama') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label>URL</label>
                    <input type="text" wire:model="url" class="w-full border rounded p-2">
                </div>
                <div class="mb-3">
                    <label>Parent Menu</label>
                    <select wire:model="parent_id" class="w-full border rounded p-2">
                        <option value="">-- Menu Utama --</option>
                        @foreach($parents as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Urutan</label>
                    <input type="number" wire:model="urutan" class="w-full border rounded p-2">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" wire:click="closeModal"
                        class="px-3 py-1 bg-gray-500 text-white rounded">Batal</button>
                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>