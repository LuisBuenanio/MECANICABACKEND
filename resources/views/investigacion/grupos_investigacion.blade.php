<x-app-layout>
    <div class=" container  py-8">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-900 text-center ">GRUPOS DE INVESTIGACIONES</h1>
            <br>
        </div> 
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            @forelse ($grupos_investigaciones as $grupo_investigacion)
                <div class="p-4 cols-start-2 block">
                    <a href="{{route('grupo_investigacion', $grupo_investigacion)}}">
                    {{-- <a href="{{ url('/galeria/'.$galeria->id) }}"> --}}
                        <div class="object-center bg-red-200">                                
                            <h2 class="text-2xl font-bold text-gray-800 text-center  mt-4">{{ $grupo_investigacion->nombre }}</h2>
                            <p class="text-base decoration-solid py-4 text-gray-800 mt-4 text-center" > {{ $grupo_investigacion->siglas }} </p>
                            <p class="text-base decoration-solid py-4 text-gray-800 mt-4 text-center" > {{ $grupo_investigacion->codigo }} </p>
                        </div>                            
                    </a>
                </div>
            @empty
                No existen galerias a visualizar  
            @endforelse  
        </div>
        <div class=" mt-4" >
            {{ $grupos_investigaciones->links() }} 
        </div>  
    </div>
</x-app-layout>