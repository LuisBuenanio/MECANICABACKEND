<x-app-layout>
    <style>
        .imagenmv {
            background-image: url("{{ asset('img/asociacion/' . $asociaciones->logo) }}");
            background-position: center;
            background-size: cover;
            height: 180px;
            width: 100%;
            max-width: 340px;
            margin: auto;
        }

        .imagenautoridad {
            height: 130px;
            width: 120px;
            margin: auto;
        }

        .iconof {
            height: 60px;
            width: 60px;
            margin: auto;
        }
    </style>

    <!-- Misión y Visión de la Asociación -->
    <div class="container mx-auto py-8">
        <div class="text-center">
            <br>
            <br>
            <br>
            <br>
            <h1 class="text-4xl font-extrabold text-gray-800">{{ $asociaciones->nombre }}</h1>
            <br>
        </div>

        <!-- Estructura responsive con 3 columnas en pantallas grandes y una columna en móviles -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
            <!-- Misión -->
            <div class="p-4">
                <h2 class="text-2xl font-bold text-gray-800 text-center lg:text-left">Misión</h2>
                <p class="text-base text-gray-700 mt-2 text-justify">{!! $asociaciones->mision !!}</p>
            </div>

            <!-- Imagen de la Asociación al centro en pantallas grandes -->
            <div class="imagenmv mx-auto"></div>

            <!-- Visión -->
            <div class="p-4">
                <h2 class="text-2xl font-bold text-gray-800 text-center lg:text-right">Visión</h2>
                <p class="text-base text-gray-700 mt-2 text-justify">{!! $asociaciones->vision !!}</p>
            </div>
        </div>
    </div>

    <!-- Integrantes de la Asociación -->
    <div class="container mx-auto py-8">
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-gray-800">Integrantes de la Asociación</h1>
            <br>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($integrantes as $integrante)
                <div class="text-center p-4">
                    @if ($integrante->foto != "")
                        <img src="{{ asset('img/asociacion/integrantes/'.$integrante->foto) }}" alt="{{ $integrante->nombre }}" class="imagenautoridad rounded-lg bg-center bg-cover">
                    @else
                        <img src="{{ asset('img/asociacion/integrantes/integrante.png') }}" alt="{{ $integrante->nombre }}" class="imagenautoridad rounded-lg bg-center bg-cover">
                    @endif
                    <h2 class="text-lg font-bold text-gray-800 mt-2">{{ $integrante->nombre }}</h2>
                    <p class="text-gray-700">{{ $integrante->descripcion }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Datos de contacto de la Asociación -->
    <div class="container mx-auto py-8">
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-gray-800">Contactos de la Asociación</h1>
            <br>
        </div>

        <!-- Contactos alineados en tres columnas en pantallas grandes, una columna en móviles -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Información de contacto: Email y Teléfono -->
            <div class="text-center p-4">
                <p class="font-bold">Email:</p>
                <p>{{ $asociaciones->email }}</p>
                <p class="font-bold mt-2">Tel:</p>
                <p>{{ $asociaciones->telefono }}</p>
            </div>
            

            <!-- Información de contacto: Fecha de creación -->
            <div class="text-center p-4">
                <p class="font-bold">Fecha Creación:</p>
                <p>{{ $asociaciones->fecha_creacion }}</p>
            </div>

            <!-- Redes sociales -->
            <div class="text-center p-4">
                <p class="font-bold">Facebook:</p>
                <a href="{{ $asociaciones->facebook }}" target="_blank" title="Facebook">
                    <img class="iconof" src="{{ asset('img/logos/facebook-verde.svg') }}" alt="Facebook">
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
