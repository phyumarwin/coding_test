<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            <!-- Sidebar for Admin Only -->
            @if(auth()->check() && auth()->user()->role === 'Administrator')
                <aside class="w-64 bg-gray-800 text-white">
                    <h2 class="p-4 text-xl font-semibold">Admin Dashboard</h2>
                    <nav class="space-y-2">
                        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700">Dashboard</a>
                        <a href="{{ route('companies.index') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700">Companies</a>
                        <a href="{{ route('employees.index') }}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700">Employees</a>
                    </nav>
                </aside>
            @endif
        
            <!-- Main Content Area -->
            <div class="flex-1">
                <!-- Navigation -->
                @include('layouts.navigation')
        
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
        
                <!-- Page Content -->
                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
