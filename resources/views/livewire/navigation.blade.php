<nav class="bg-red-600" x-data="{ open: false }" x-cloak style="position: fixed; top: 0; width: 100%; z-index: 1000;">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
         <!-- Mobile menu button-->
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            
            <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Abrir menú principal</span>
            <!--
                Icon when menu is closed.

                Heroicon name: outline/menu

                Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!--
                Icon when menu is open.

                Heroicon name: outline/x

                Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
        </div>

        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        
            {{--logotipo--}}  
            <a href="/" class="flex-shrink-0 flex items-center justify-center">
                <img class=" block lg:hidden h-12 w-auto object-center  " src="{{ asset('img/logos/logo-mecanica-color.png') }}" alt="">
                <img class="hidden lg:block h-12 w-auto object-center" src="{{ asset('img/logos/logo-mecanica-color.png') }}" alt="">   <!-- logo grande -->
            </a>

            {{--Menu--}}
            <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{route('noticias')}}" class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Noticias</a>
                    <a href="{{route('asociacion')}}"class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Asociación</a>
                    
                    {{-- <div class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button x-on:click="open = true" type="button" class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="research-menu-button" aria-expanded="false" aria-haspopup="true">
                                Investigación
                            </button>
                        </div>
                    
                        {{-- Submenú "Investigación" 
                        <div x-show="open" x-cloak x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="research-menu-button" tabindex="-1">
                            
                            {{-- Submenú "Grupos de Investigación" 
                            <div class="relative" x-data="{ openFaculty: false, openSchool: false }">
                                <button x-on:click="openFaculty = !openFaculty" type="button" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left focus:outline-none">
                                    Líneas de Investigación
                                </button>
                                <div x-show="openFaculty" x-cloak class="ml-3 origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5">
                                    <a href="{{ route('lineasesc') }}" class="block px-4 py-2 text-sm text-gray-700">Escuela</a>
                                    <a href="{{ route('lineasfac') }}" class="block px-4 py-2 text-sm text-gray-700">Facultad</a>
                                    <!-- Agrega más enlaces según sea necesario -->
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="ml-3 relative" x-data="{open: false}">
                        <div>
                            <button x-on:click="open = true" type="button" class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                Investigación
                            </button>
                        </div>
                    
                        {{--Opciones de Usuario--}}
                        <div x-show="open" x-cloak x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('gruposinvestigacion') }}" class="block px-4 py-2 text-sm text-gray-700">Grupos de Investigación</a>  
                        </div>
                    </div>
                    
                    <div class="ml-3 relative" x-data="{open: false}">
                        <div>
                            <button x-on:click="open = true" type="button" class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                Vinculación
                            </button>
                        </div>
                    
                        {{--Opciones de Usuario--}}
                        <div x-show="open" x-cloak x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('convenios') }}" class="block px-4 py-2 text-sm text-gray-700">Convenios</a>                         
                            <a href="{{ route('proyectos') }}" class="block px-4 py-2 text-sm text-gray-700">Proyectos</a>
                        </div>
                    </div>
                    
                    


                    
                    <a href="{{route('galerias')}}" class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Galeria</a>
                    
                    
                    <div class="ml-3 relative" x-data="{open: false}">
                        <div>
                            <button x-on:click="open = true" type="button" class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                Académico
                            </button>
                        </div>
                        {{--Opciones de Usuario--}}
                        <div x-show="open" x-cloak x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('docentes') }}" class="block px-4 py-2 text-sm text-gray-700">Docentes</a>      
                            <a href="{{ route('titulacion') }}" class="block px-4 py-2 text-sm text-gray-700">Titulación</a>
                            <a href="{{ route('maestrias') }}" class="block px-4 py-2 text-sm text-gray-700">Maestrías</a>
                        </div>
                    </div>
                    
                    
                    <!-- VINCULACION PROYECTOS Y CONVENIOS -->

                     

                    <a href="{{route('secretaria')}}"class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Secretaria</a>
                   

                    
                    

                    
                    <a href="/calendario" class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendario</a>
               


                </div>
            </div>
        </div>

        @auth
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                
                {{--Boton Notificacion --}}
                <button type="button" class="bg-red-200 p-1 rounded-full text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-200 focus:ring-white">
                    <span class="sr-only">Ver Notificaciones</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <!-- Perfil dropdown de Usuario -->
                <div class="ml-3 relative" x-data="{open: false}">
                    <div>
                        <button  x-on:click="open = true" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Abrir menú de usuario</span>
                            <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                        </button>
                    </div>

                    {{--Opciones de Usuario--}}
                    <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Tu perfil</a>
                        
                        @can('admin.home')
                            <a href="{{route('admin.home')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashbaord</a>
                        @endcan
                        <a href="{{route('chat')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Chat</a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();" >
                                Cerrar Sesión</a>
                        </form>                    
                    </div>
                </div>
            </div>
        @else
            <div>                
                <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Iniciar Sesión</a>
                {{-- <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Registrarse</a>
             --}} </div>
        @endauth
    </div>
  </div>

  <!-- Menu Movil. -->
  <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.way="open = false">
    <div class="fixed bg-red-600 px-2 pt-2 pb-3 space-y-1">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="/" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Inicio</a>
        <a href="{{route('noticias')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Noticias</a>
        
        <a href="https://cimogsys.espoch.edu.ec/idi/public/grupos/FM" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Investigación</a>
        <a href="{{route('asociacion')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Asociación</a>
        <a href="{{route('galerias')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Galeria</a>
        <a href="{{route('convenios')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Convenios</a>
        <a href="{{route('proyectos')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Proyectos</a>
        <a href="/calendario" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendario</a>
        
       
    </div>
  </div>
</nav>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('menu', () => ({
            open: false
        }));
    });

    document.addEventListener('DOMContentLoaded', function () {
        Alpine.start();
    });
    
</script>