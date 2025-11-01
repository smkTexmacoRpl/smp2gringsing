<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>{{ $appName2 }}</title>
 @vite('resources/css/app.css')
 @vite('resources/js/app.js')

 <!-- Tailwind CSS v3.4 -->
 {{-- @include('layouts.partial.style') --}}

</head>

<body class="bg-gray-50 dark:bg-gray-900 text-primary-800 dark:text-gray-200">

 <main>

  @yield('content')


  <section id='footer'>
   <x-halaman_depan.footer />

  </section>
 </main>

</body>

</html>