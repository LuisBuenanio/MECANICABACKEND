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
            <br>
            <br>
            <br>
            <div class=" bg-cover px-4 py-2 bg-red-600  flex float-right">
                <p><a href="{{ route('galerias') }}" class="btn btn-light text-sm italic font-bold text center">Volver a Galerias</a> </p>
            </div>  
            <h1 class="text-4xl font-bold text-gray-800 text-center" >Galería de : {!!$galeriap->nombre!!}</h1> <br>         
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" >
            @forelse ($multimedia as $image)
                <div class="p-4 cols-start-2 block">
                    <a href="{{asset('img/galerias/imagenes/'.$image->url) }}">
                    <img class ="imagenmv rounded-lg bg-center bg-cover mt-4" src="{{asset('img/galerias/imagenes/'.$image->url) }}" alt="">
                </a>
                
                </div>
            @empty
                <p>No existen imagenes a visualizar</p>
            @endforelse 

        </div>

    </div>


</x-app-layout>