<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Escuela de Ingeniería Mecánica') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@3.x/dist/alpine.min.js" defer></script>
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
       
        
        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
                font-family: 'Nunito', sans-serif;
            }
    
            .min-h-screen {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
    
            main {
                flex: 1;
            }
        </style>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Footer Content -->
            <footer class="mt-4 px-3 py-2 text-sm font-medium flex justify-center bg-red-600 shadow ">
                <div class=" text-white">
                    <p> © {{ date('Y') }}  Escuela de Ingeniería Mecánica - ESPOCH</p>               
                    <p class="text-center">Copyright - Software - Espoch - Jose Luis Buenaño </p>  
                </div>          
            </footer> 
            

        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
