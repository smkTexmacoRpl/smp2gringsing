<!-- Backdrop/Modal Wrapper -->
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 p-4">

 <div class="dark:bg-gray-700 dark:text-amber-50 bg-white rounded-lg w-full max-w-4xl flex flex-col max-h-[95vh]">

  <!-- HEADER (Fixed Top) -->
  <div class="p-6 border-b sticky top-0 bg-white dark:bg-gray-700 z-10">
   <h2 class="text-xl font-bold">
    {{ $prakataId ? 'Edit Profil Sekolah' : 'Tambah Profil Sekolah' }}
   </h2>
  </div>


  <div class="p-6 overflow-y-auto flex-1">

   <!-- We keep the wire:submit on the form, but move the buttons outside the scrollable area -->
   <form wire:submit.prevent="store" id="prakata-form">

    <!-- Full-Width Fields (Visi, Misi, Logo) -->
    <div class="mb-4">
     <label class="block mb-1 font-semibold">Judul</label>
     <input type="text" wire:model="judul"
      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600">
     @error('judul') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>


    <div class="mb-4">
     <label class="block mb-1 font-semibold">Isi</label>
     <textarea wire:model="isi" rows="3"
      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600"></textarea>
     @error('isi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Two-Column Fields (Name, Alamat, Email, Telepon) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

     <div class="mb-4">
      <label class="block mb-1 font-semibold">Kepsek</label>
      <input type="text" wire:model="kepsek"
       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600">
      @error('kepsek') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
     </div>
     <div class="mb-4">
      <label class="block mb-1 font-semibold">Foto Kepsek</label>
      <input type="file" wire:model="foto_kepsek"
       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600">
      @error('foto_kepsek') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      @if (is_object($foto_kepsek))
      <img src="{{ $foto_kepsek->temporaryUrl() }}" alt="Preview" class="mt-2 h-20 w-20 object-cover rounded">
      @elseif ($prakataId && $prakata->foto_kepsek)
      <img src="{{ asset('storage/foto_kepsek/' . $prakata->foto_kepsek) }}" alt="Current Foto Kepsek"
       class="mt-2 h-20 w-20 object-cover rounded">
      @endif
     </div>
    </div>
    <div class="flex justify-end space-x-2 p-4 border-t sticky bottom-0 bg-white dark:bg-gray-700 z-10">
     <button type="button" wire:click="closeModal"
      class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition-colors">Batal</button>

     <!-- Use form="profil-form" to submit the form from outside the <form> tag -->
     <button type="submit"
      class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Simpan</button>

    </div>

   </form>


  </div>

  <!-- FOOTER/BUTTONS (Fixed Bottom) -->

 </div>