<x-app-layout>
    <style>
        .imagenmv{
            background-image: url("{{asset('img/asociacion/'.$asociaciones->logo)}}");
            height: 180px;
            width: 340px;
            margin: auto
    
        }
        .imagenautoridad{
            height: 130px;
            width: 120px;
            margin: auto
        }
        .iconof{
            height: 60px;
            width: 60px;
            margin: auto
        }
    </style>
    {{-- Mision y vISION DE LA ASOCIACION --}}
    <div class="container">
        <div>
            <br>
            <br>
            <br>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-600 text-center ">{{$asociaciones->nombre}}</h1>
            <br>
        </div>
        <div class="grid grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="w-full p-4 cols-start-2">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Misión</h2>
                <p class="text-base text-gray-700 mt-2 text-justify" > {!!$asociaciones->mision!!} </p>
            </div>
            <div class=" imagenmv bg-cover bg-center cols-start-2"></div>
            <div class="w-full p-4  cols-start-4">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Visión</h2>
                <p class="text-base text-gray-700 mt-2 text-justify"> {!!$asociaciones->vision!!} </p>
            </div>
        </div> 
    </div>
    {{-- Integrantes de la asociacion --}}
    <div class="container">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-600 text-center ">Integrantes de la Asociación</h1>
            <br>
        </div>
        <div class="grid grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($integrantes as $integrante)
            
                <div class="p-4 cols-start-2 block">
                    @if ($integrante->foto != "")
                                        <img src="{{ asset('img/asociacion/integrantes/'.$integrante->foto) }}" alt="" class="imagenautoridad rounded-lg bg-center bg-cover">
                                    @else
                                        <img src="{{ asset('img/asociacion/integrantes/integrante.png') }}" alt="" class="imagenautoridad block object-cover ">
                                    @endif
                    <h2 class="text-base font-bold text-gray-800 text-center">{{ $integrante->nombre }}</h2>
                    <p class="text-base decoration-solid text-gray-800 mt-2 text-center" > {{ $integrante->descripcion }} </p>
                </div>
            @endforeach
        
        </div>
    </div>  

    {{-- Datos de contacto de la asociacion --}}
    <div class="container">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-600 text-center ">Contactos de la Asociación</h1>
            <br>
        </div>
        <div class="grid grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="w-full p-4 text-center cols-start-2">
                
                <p class="font-bold mt-2" >Email:</p> <p>{{ $asociaciones->email }}</p>
                <p class="font-bold mt-2" >Tel:</p> <p>{{ $asociaciones->telefono }}</p>
                
            </div>
            <div class="w-full p-4 text-center cols-start-4">
                <p class="font-bold mt-2" >Fecha Creación:</p> <p>{{ $asociaciones->fecha_creacion }}</p>                
                <p class="font-bold mt-2"> Facebook:
                    <a class="p-0" href="{{$asociaciones->facebook}}" target="blank" title="Facebook">
                        <img class="iconof p-0"src="{{ asset('img/logos/facebook-verde.svg') }}" alt="">
                    </a>
                </p>				
                
            </div>
            
        </div> 
        
    </div> 
</x-app-layout>