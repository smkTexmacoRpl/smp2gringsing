<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard SMP N2 Geringsing ')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-hidden {
            transform: translateX(-100%);
        }

        @media (min-width: 768px) {
            .sidebar-hidden {
                transform: translateX(0);
                width: 0;
                overflow: hidden;
            }
        }

        /* Smooth transitions */
        #sidebar {
            transition: all 0.3s ease-in-out;
        }
    </style>
    @livewireStyles
</head>

<body class="h-full bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="flex h-full">
        <!-- Sidebar -->

        <x-sidebar />

        <!-- Main Content -->
        <div id="main-content" class="flex-1 flex flex-col overflow-hidden transition-all duration-300">
            <!-- Header -->
            <x-header />
            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-50 dark:bg-gray-900">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Selamat Datang, Admin!</h1>
                    <p class="text-gray-600 dark:text-gray-400">Ini adalah dashboard admin Anda.</p>
                </div>

                <!-- Cards -->
                <x-card />

                <!-- Form Input -->
                <x-form />

                <!-- Table -->
                <x-table />

            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/dash.min.js') }}"> </script>
    @livewireScripts
</body>

</html>