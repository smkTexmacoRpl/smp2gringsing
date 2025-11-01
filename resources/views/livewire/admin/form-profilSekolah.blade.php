<!-- Backdrop/Modal Wrapper -->
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 p-4">

    <!-- 
    Modal Content Box: 
    1. Added flex flex-col to enable internal layout control.
    2. Added max-h-[95vh] to prevent the modal from ever exceeding 95% of the viewport height.
    3. Made width responsive (w-full on mobile, up to max-w-4xl on desktop).
    -->
    <div class="dark:bg-gray-700 dark:text-amber-50 bg-white rounded-lg w-full max-w-4xl flex flex-col max-h-[95vh]">

        <!-- HEADER (Fixed Top) -->
        <div class="p-6 border-b sticky top-0 bg-white dark:bg-gray-700 z-10">
            <h2 class="text-xl font-bold">
                {{ $profilId ? 'Edit Profil Sekolah' : 'Tambah Profil Sekolah' }}
            </h2>
        </div>

        <!-- 
        SCROLLABLE FORM BODY 
        1. Added overflow-y-auto to enable vertical scrolling.
        2. Added flex-1 to make this section take up all available vertical space.
        -->
        <div class="p-6 overflow-y-auto flex-1">

            <!-- We keep the wire:submit on the form, but move the buttons outside the scrollable area -->
            <form wire:submit.prevent="store" id="profil-form">

                <!-- Two-Column Fields (Name, Alamat, Email, Telepon) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Nama Sekolah</label>
                        <input type="text" wire:model="nama_sekolah"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600">
                        @error('nama_sekolah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Alamat</label>
                        <input type="text" wire:model="alamat"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600">
                        @error('alamat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Email</label>
                        <input type="text" wire:model="email"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600">
                        @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Telepon</label>
                        <input type="number" wire:model="telepon"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600">
                        @error('telepon') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Full-Width Fields (Visi, Misi, Logo) -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Visi</label>
                    <textarea wire:model="visi" rows="3"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600"></textarea>
                    @error('visi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Misi</label>
                    <textarea wire:model="misi" rows="4"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600"></textarea>
                    @error('misi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Logo</label>
                    <input type="file" wire:model="logo"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('logo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </form>
        </div>

        <!-- FOOTER/BUTTONS (Fixed Bottom) -->
        <div class="flex justify-end space-x-2 p-4 border-t sticky bottom-0 bg-white dark:bg-gray-700 z-10">
            <button type="button" wire:click="closeModal"
                class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition-colors">Batal</button>

            <!-- Use form="profil-form" to submit the form from outside the <form> tag -->
            <button type="submit" form="profil-form"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Simpan</button>
        </div>
    </div>
</div>