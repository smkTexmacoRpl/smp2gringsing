<div>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div
            class="p-6 border-b dark:border-gray-700 flex flex-col md:flex-row justify-between items-start md:items-center">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 md:mb-0">Counter </h2>

            <div class="flex space-x-2">
                <x-button />

            </div>

        </div>
        @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-3">
            {{ session('message') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            siswa</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Guru</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            tedik</th>

                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($counters as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="p-1 h-5 w-5 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                    {{ $item->siswa }}
                                </div>

                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $item->guru }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $item->tendik }}
                            </div>


                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button wire:click="edit({{ $item->id }})"
                                class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</button>

                            <button wire:click="delete({{ $item->id }})"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
    @if ($isOpenModal)
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 z-10 w-full max-w-md">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                {{ $isEditMode ? 'Edit Counter' : 'Tambah Counter' }}</h2>

            <form wire:submit.prevent="store">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="siswa"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Siswa</label>
                        <input type="number" id="siswa" wire:model="siswa"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                        @error('siswa') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="guru"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Guru</label>
                        <input type="number" id="guru" wire:model="guru"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                        @error('guru') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="tedik"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tendik</label>
                        <input type="number" id="tendik" wire:model="tendik"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                        @error('tendik') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kelas"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kelas</label>
                        <input type="number" id="kelas" wire:model="kelas"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                        @error('kelas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="staff"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Staff</label>
                        <input type="number" id="staff" wire:model="staff"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                        @error('staff') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="penghargaan"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Penghargaan</label>
                        <input type="number" id="penghargaan" wire:model="penghargaan"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                        @error('penghargaan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="alumni"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Alumni</label>
                    <input type="number" id="alumni" wire:model="alumni"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                    @error('alumni') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end">
                    <button type="button" wire:click="closeModal"
                        class="mr-3 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>