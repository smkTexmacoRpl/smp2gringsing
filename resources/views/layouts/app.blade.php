<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Blog SMA')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  @livewireStyles
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">SMA Contoh</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
          @foreach(App\Models\Menu::with('children')->whereNull('parent_id')->orderBy('urutan')->get() as $menu)
          <li class="relative group">
            <a href="{{ $menu->url ?? '#' }}">{{ $menu->nama }}</a>
            @if($menu->children->count())
            <ul class="absolute hidden group-hover:block bg-white text-black mt-2 rounded shadow">
              @foreach($menu->children as $child)
              <li><a href="{{ $child->url }}" class="block px-4 py-2 hover:bg-gray-200">{{ $child->nama }}</a></li>
              @endforeach
            </ul>
            @endif
          </li>
          @endforeach
          <li class="nav-item"><a class="nav-link" href="{{ url('#') }}">

              <div id="google_translate_element"></div>
            </a></li>
          @auth
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.posts') }}">Dashboard</a></li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">@csrf<button
                class="btn btn-link nav-link">Logout</button>
            </form>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">

    @yield('content')
  </main>

  <footer class="bg-dark text-light py-4 mt-5">
    <div class="container text-center">© {{ date('Y') }} SMA Contoh</div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  @livewireScripts
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement(
        {
            pageLanguage: 'id', // Bahasa asli situs Anda
             includedLanguages: 'en,ms,jv,su,zh-CN', // Bahasa yang ingin Anda sediakan
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 
        'google_translate_element'
      );
    }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
  </script>
</body>

</html>