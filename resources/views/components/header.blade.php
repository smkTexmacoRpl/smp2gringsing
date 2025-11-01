<header class="bg-white dark:bg-gray-800 shadow-sm z-10">
  <div class="flex items-center justify-between p-4">
    <div class="flex items-center">
      <button id="mobile-sidebar-toggle" class="md:hidden text-gray-600 dark:text-gray-300 mr-4">
        <i class="fas fa-bars"></i>
      </button>
      <button id="desktop-sidebar-toggle" class="hidden md:block text-gray-600 dark:text-gray-300 mr-4">
        <i class="fas fa-bars"></i>
      </button>
      <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Dashboard</h2>
    </div>

    <div class="flex items-center space-x-4">
      <button id="dark-mode-toggle" class="text-gray-600 dark:text-gray-300">
        <i class="fas fa-moon dark:hidden"></i>
        <i class="fas fa-sun hidden dark:block"></i>
      </button>

      <div class="relative">
        <button class="flex items-center text-gray-600 dark:text-gray-300">
          <i class="fas fa-bell"></i>
          <span
            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
        </button>
      </div>

      <div class="relative">
        <button class="flex items-center space-x-2">
          <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">{{
            auth()->user()->name[0] }}</div>
          <span class="text-gray-700 dark:text-gray-300 hidden md:block">{{ auth()->user()->name }}</span>
        </button>
      </div>
    </div>
  </div>
</header>