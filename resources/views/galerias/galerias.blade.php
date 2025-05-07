<x-app-layout>
    <style>
        .imagenmv{
            height: 200px;
            width: 350px;
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
    <div class=" container  py-8">
        <div>
            
        <br>
        <br>
            <h1 class="text-4xl font-extrabold text-gray-900 text-center ">Galerías</h1>
          
        </div> 
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-2">
            @forelse ($galerias as $galeria)
                <div class="p-4 cols-start-2 block">
                    
                        <a href="{{route('galeria', $galeria)}}">
                            <div class="object-center">
                                
                                <h2 class="text-2xl font-bold text-gray-800 text-center py-4 mt-4">{{ $galeria->nombre }}</h2>
                                @if($galeria->portada) 
                                    <img class="imagenmv rounded-lg bg-center bg-cover mt-4" src="{{asset('img/galeria_port/'.$galeria->portada)}}" alt="">
                                @else
                                    <img class="imagenmv rounded-lg bg-center bg-cover mt-4" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg" alt="">
                                @endif
                                <p class="text-base decoration-solid text-gray-800 mt-4 text-center" > {{ $galeria->descripcion }} </p>
                            </div>
                            
                        </a>
                    
                    
                </div>   
            @empty
                No existen galerias a visualizar  
            @endforelse          
        </div>              
        
        <div class=" mt-4" >
            {{ $galerias->links() }} 
        </div>        
    </div> 
</x-app-layout>