<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
 <div class="p-6 border-b dark:border-gray-700 flex flex-col md:flex-row justify-between items-start md:items-center">
  <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 md:mb-0">Daftar Pengguna</h2>
  <div class="flex space-x-2">
   <x-cari />
   <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
    <i class="fas fa-plus mr-2"></i>Tambah
   </button>
  </div>
 </div>

 <div class="overflow-x-auto">
  <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
   <thead class="bg-gray-50 dark:bg-gray-700">
    <tr>
     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
      Nama</th>
     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
      Email</th>
     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
      Role</th>
     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
      Status</th>
     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
      Aksi</th>
    </tr>
   </thead>
   <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
    <tr>
     <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
       <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">A
       </div>
       <div class="ml-4">
        <div class="text-sm font-medium text-gray-900 dark:text-white">Ahmad Rizki</div>
       </div>
      </div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <div class="text-sm text-gray-900 dark:text-white">ahmad@example.com</div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <span
       class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">Admin</span>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <span
       class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Aktif</span>
     </td>
     <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
      <a href="#" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</a>
      <a href="#" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</a>
     </td>
    </tr>

    <tr>
     <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
       <div class="h-10 w-10 rounded-full bg-green-500 flex items-center justify-center text-white font-semibold">S
       </div>
       <div class="ml-4">
        <div class="text-sm font-medium text-gray-900 dark:text-white">Siti Nurhaliza</div>
       </div>
      </div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <div class="text-sm text-gray-900 dark:text-white">siti@example.com</div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <span
       class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Editor</span>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <span
       class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Aktif</span>
     </td>
     <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
      <a href="#" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</a>
      <a href="#" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</a>
     </td>
    </tr>

    <tr>
     <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
       <div class="h-10 w-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-semibold">B
       </div>
       <div class="ml-4">
        <div class="text-sm font-medium text-gray-900 dark:text-white">Budi Santoso</div>
       </div>
      </div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <div class="text-sm text-gray-900 dark:text-white">budi@example.com</div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <span
       class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">Viewer</span>
     </td>
     <td class="px-6 py-4 whitespace-nowrap">
      <span
       class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">Nonaktif</span>
     </td>
     <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
      <a href="#" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Edit</a>
      <a href="#" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</a>
     </td>
    </tr>
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