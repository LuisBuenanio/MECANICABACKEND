<x-app-layout>
    <style>
        .imagenmv{
            height: 380px;
            width: 380px;
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
    <div class="container py-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-800 text-center" > {!!$grupos_investigacionesp->nombre!!}</h1> <br>         
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4" >
            <div class="p-4 cols-span-2 bg-red-100">
                <h1 class="text-2xl font-bold text-gray-800 text-center" >Misión:</h1>
                <h1 class="text-base  text-gray-800 text-justify" >{{$grupos_investigacionesp->mision}} </h1>
                <h1 class="text-2xl font-bold text-gray-800 text-center" >Visión:</h1>
                <h1 class="text-base  text-gray-800 text-justify" >{{$grupos_investigacionesp->vision}} </h1>            
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-start-1 col-end-3 mt-4">
                        <h2>Código:{{$grupos_investigacionesp->codigo}}</h2>
                    </div>
                    <div class="col-end-7 col-span-2 mt-4">
                        <h2>siglas:{{$grupos_investigacionesp->siglas}}</h2>
                    </div>
                </div>
            
            </div>
            <div>
                @forelse ($investigadores as $investigador)
                <div class="">                    
                {{$investigador->nombre}}
                
                </div>
                @empty
                    <p>No existen imagenes a visualizar</p>
                @endforelse 
        </div>

        <div class="grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-span-3 ...">01</div>
            <div class="col-span-2 ...">02</div>
            <div class="row-span-2 col-span-2 ...">03</div>
        </div>

    </div>
    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">01</div>
        <div class="col-span-2 ...">02</div>
        <div class="row-span-2 col-span-2 ...">03</div>
      </div>


</x-app-layout>