<aside id="sidebar"
  class="w-64 bg-white dark:bg-gray-800 shadow-md h-full fixed md:relative transition-all duration-300 z-10 sidebar-hidden md:!translate-x-0 md:w-64">

  <div class="p-4 flex justify-between items-center border-b dark:border-gray-700">
    <h1 class="text-xl font-bold text-gray-800 dark:text-white">Admin Panel</h1>
    <button id="sidebar-toggle" class="md:hidden text-gray-600 dark:text-gray-300">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <nav class="mt-6">
    <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
      Menu Utama
    </div>

    <a href="#"
      class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
      <i class="fas fa-home mr-3"></i>
      <span>Dashboard</span>
    </a>

    <div class="dropdown">
      <button
        class="dropdown-btn flex items-center justify-between w-full px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
        <div class="flex items-center">
          <i class="fas fa-gears mr-3"></i>
          <span>Config Web</span>
        </div>
        <i class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
      </button>
      <div class="dropdown-content hidden pl-4 bg-gray-50 dark:bg-gray-800">
        <a href="{{ route('admin.profil-sekolah') }}" wire:navigate
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Profil
          Sekolah</a>
        <a href="{{ route('admin.prakata') }}" wire:navigate
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">prakata</a>
        <a href="{{ route('admin.menu') }}" wire:navigate
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Menu</a>
        <a href="{{ route('admin.counter') }}" wire:navigate
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Counter</a>

      </div>
    </div>

    <div class="dropdown">
      <button
        class="dropdown-btn flex items-center justify-between w-full px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
        <div class="flex items-center">
          <i class="fas fa-box mr-3"></i>
          <span>Manajemen Blog</span>
        </div>
        <i class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
      </button>
      <div class="dropdown-content hidden pl-4 bg-gray-50 dark:bg-gray-800">
        <a href="{{ route('admin.posts') }}"
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Semua
          Blog</a>
        <a href="{{ route('admin.kategori') }}" wire:navigate
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Kategori</a>
        <a href="{{ route('admin.tag') }}" wire:navigate
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Tag</a>
        <a href="{{ route('admin.galeri') }}" wire:navigate
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">galeri</a>
      </div>
    </div>
    <div class="dropdown">
      <button
        class="dropdown-btn flex items-center justify-between w-full px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
        <div class="flex items-center">
          <i class="fas fa-users mr-3"></i>
          <span>Manajemen User</span>
        </div>
        <i class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
      </button>
      <div class="dropdown-content hidden pl-4 bg-gray-50 dark:bg-gray-800">
        <a href="#"
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Daftar
          User</a>
        <a href="#"
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Tambah
          User</a>
        <a href="#"
          class="block px-4 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Role
          &
          Permission</a>
      </div>
    </div>

    <a href="#"
      class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
      <i class="fas fa-chart-bar mr-3"></i>
      <span>Laporan</span>
    </a>

    <a href="#"
      class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
      <i class="fas fa-cog mr-3"></i>
      <span>Logout</span>

    </a>
  </nav>
</aside>