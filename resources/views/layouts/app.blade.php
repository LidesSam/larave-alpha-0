<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/> 

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
                integrity="sha512-...your-integrity-hash..." crossorigin="anonymous" 
                referrerpolicy="no-referrer" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        <x-banner />

        <div class="flex flex-col flex-grow bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-grow flex items-center justify-center py-12">
                {{ $slot }}
            </main>

            <footer class="bg-gray-800 text-white py-4">
                <div class="max-w-7xl mx-auto text-center">
                    <p>&copy; {{ date('Y') }} Ariana Arrieta Nutricionista. All rights reserved.</p>
                    <p>
                        <a href="/privacy" class="text-blue-300 hover:underline">Privacy Policy</a> | 
                        <a href="/terms" class="text-blue-300 hover:underline">Terms of Service</a>
                    </p>
                </div>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
