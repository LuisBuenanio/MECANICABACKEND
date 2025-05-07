<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>{{ config('app.name', 'Escuela de Ingeniería Mecánica') }}</title> -->
        <title>{{ str_replace('-', ' ', config('app.name', 'Escuela de Ingeniería Mecánica')) }}</title>


        <!-- Favicon -->
        <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png"/>
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png"/>

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
            /* Botón flotante */
            /* Botón flotante */
            .floating-button {
                position: fixed;
                bottom: 30px;
                right: 15px;
                background-color: #ff5722;
                border-radius: 30px; /* Cambiado de 50% a 30px para permitir el texto */
                padding: 10px 20px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                z-index: 1000;
            }
            
            /* Imagen de ícono de descarga */
            .floating-button img {
                width: 30px;
                height: 30px;
                margin-right: 10px; /* Espacio entre el ícono y el texto */
            }
            
            /* Texto del botón */
            .floating-button p {
                margin: 0;
                font-size: 14px;
                color: white;
                text-align: center;
                white-space: nowrap; /* Para evitar que el texto se divida en varias líneas */
            }
            
            /* Hover en el botón flotante */
            .floating-button:hover {
                background-color: #e64a19;
            }

            
            .modal {
                display: none;
                position: fixed;
                z-index: 1001;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
            }
            
            .modal-content {
                background-color: white;
                padding: 20px;
                border-radius: 10px;
                width: 300px;
                text-align: center;
            }
            
            .close {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 20px;
                cursor: pointer;
            }
            
            .download-btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #ff5722;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 15px;
            }
            
            .download-btn:hover {
                background-color: #e64a19;
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
        
        <div class="floating-button" onclick="openModal()">
            <img src="{{ asset('img/logos/logo-mecanica-color.png') }}" alt="Descargar APK">
            <p>Descargar App Móvil</p>
        </div>

        
        <div id="apkModal" class="modal" onclick="closeModalOnOutsideClick(event)">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h1><strong>Descargar aplicación móvil</strong></h1>

                <p>¿Deseas descargar la aplicación móvil?</p>
                <a href="{{ asset('apk/MecApp.apk') }}" class="download-btn">Descargar APK</a>
            </div>
        </div>


        @stack('modals')
        <script>
    function openModal() {
        document.getElementById("apkModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("apkModal").style.display = "none";
    }

    function closeModalOnOutsideClick(event) {
        const modal = document.getElementById("apkModal");
        const modalContent = document.querySelector(".modal-content");

        // Si el clic es fuera del contenido del modal, se cierra
        if (!modalContent.contains(event.target)) {
            closeModal();
        }
    }
</script>


        @livewireScripts
    </body>
</html>
