<header id="header" class="bg-gray-200 fixed top-0 left-0 w-full z-50 transition-all duration-300">
  <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
    <!-- Logo -->
    <img src="{{ asset('assets/images/__logo.png') }}" alt="" width="65" height="auto">
    <a href="{{ route('home') }}"
      class="text-2xl font-bold text-green-800 dark:text-primary-400 hover:text-green-400 dark:hover:text-primary-300 transition-colors">
      {{ strtoupper($appName) }}
    </a>

    <!-- Menu Desktop -->
    <ul class="hidden md:flex items-center space-x-8">
      <li>
        {{-- <a href="{{ route('home') }}"
          class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Beranda</a> --}}
      </li>

      <!-- Dropdown Menu -->
      {{-- @foreach(App\Models\Menu::with('children')->whereNull('parent_id')->orderBy('urutan')->get() as $menu) --}}
      @foreach ($menus as $menu )
      <li class="group relative">
        <a href="{{ url($menu->url ?? '#') }}"
          class="hover:text-green-400 text-green-600 dark:hover:text-primary-400 transition-colors flex items-center ">{{
          $menu->nama
          }}
          @if($menu->children->count())

          <!-- Icon panah bawah -->
          <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
          </svg>
          @endif
        </a>

        @if($menu->children->count())
        <div
          class="dropdown-menu absolute top-full left-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg py-2">

          @foreach($menu->children as $child)
          <a href="{{ url($child->url) }}"
            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 hover:text-green-400 dark:hover:bg-gray-700">{{
            $child->nama }}</a>
          @endforeach
        </div>
        @endif

        @endforeach

      </li>

    </ul>

    <!-- Tombol Aksi & Dark Mode Toggle -->
    <div class="flex items-center space-x-4">
      <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700">
        <i data-lucide="sun" class="w-5 h-5 hidden dark:block"></i>
        <i data-lucide="moon" class="w-5 h-5 block dark:hidden"></i>
      </button>
      <a href="#"
        class="hidden md:inline-block bg-primary-600 text-white px-5 py-2 rounded-full hover:bg-primary-700 transition-colors">PPDB</a>
      <button id="mobile-menu-button" class="md:hidden p-2 rounded-md">
        <i data-lucide="menu" class="w-6 h-6"></i>
      </button>
    </div>
  </nav>
  <!-- Menu Mobile -->
  <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800">
    <ul class="flex flex-col items-center space-y-4 py-4">
      <li>
        <a href="#hero" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Beranda</a>
      </li>
      <li>
        <a href="#" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Profil</a>
      </li>
      <li>
        <a href="#jurusan" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Jurusan</a>
      </li>
      <li>
        <a href="#berita" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Berita</a>
      </li>
      <li>
        <a href="#kontak" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Kontak</a>
      </li>
      <li>
        <a href="#"
          class="bg-primary-600 text-white px-5 py-2 rounded-full hover:bg-primary-700 transition-colors">PPDB</a>
      </li>
    </ul>
  </div>
</header>