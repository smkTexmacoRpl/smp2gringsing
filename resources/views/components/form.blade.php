<div class="bg-white dark:bg-gray-800 rounded-lg shadow mb-8">
 <div class="p-6 border-b dark:border-gray-700">
  <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Tambah Pengguna Baru</h2>
 </div>
 <div class="p-6">
  <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
   <div>
    <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap</label>
    <input type="text" id="nama"
     class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
   </div>

   <div>
    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
    <input type="email" id="email"
     class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
   </div>

   <div>
    <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Role</label>
    <select id="role"
     class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
     <option>Admin</option>
     <option>Editor</option>
     <option>Viewer</option>
    </select>
   </div>

   <div>
    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
    <select id="status"
     class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
     <option>Aktif</option>
     <option>Nonaktif</option>
    </select>
   </div>

   <div class="md:col-span-2">
    <label for="catatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Catatan</label>
    <textarea id="catatan" rows="3"
     class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"></textarea>
   </div>

   <div class="md:col-span-2 flex justify-end space-x-3">
    <button type="reset"
     class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">Reset</button>
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
   </div>
  </form>
 </div>
</div>