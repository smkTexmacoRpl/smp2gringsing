<div>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div
            class="p-6 border-b dark:border-gray-700 flex flex-col md:flex-row justify-between items-start md:items-center">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 md:mb-0">Daftar kategori</h2>

            <div class="flex space-x-2">
                <x-cari />
                <button wire:click="openModal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    <i class="fas fa-plus mr-2"></i>Tambah
                </button>
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
                            No</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Kategori</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            slug</th>

                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="p-1 h-5 w-5 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                    {{ $loop->iteration }}
                                </div>

                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $category->nama_kategori }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">
                                {{ $category->slug }}
                            </div>


                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button wire:click="edit({{ $category->id }})"
                                class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</button>

                            <button wire:click="delete({{ $category->id }})"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t dark:border-gray-700 flex flex-col md:flex-row justify-between items-center">
            <div class="text-sm text-gray-700 dark:text-gray-400 mb-4 md:mb-0">
                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">3</span> dari <span
                    class="font-medium">12</span> hasil
            </div>
            <div class="flex space-x-2">
                <button
                    class="px-3 py-1 rounded border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">Sebelumnya</button>
                <button class="px-3 py-1 rounded bg-blue-500 text-white">1</button>
                <button
                    class="px-3 py-1 rounded border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">2</button>
                <button
                    class="px-3 py-1 rounded border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">3</button>
                <button
                    class="px-3 py-1 rounded border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">Selanjutnya</button>
            </div>
        </div>
    </div>
    @if ($isModalOpen)
    @include('livewire.admin.form-kategori')
    @endif
</div>