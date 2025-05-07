<x-app-layout>
    <div class=" container  py-8">
        <div>
            <br>
            <br>
            <br>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-900 text-center ">Noticias</h1>
            <br>
        </div>            
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">                            
            @foreach($noticias as $noticia)
            <article class="w-full h-80 bg-cover bg-center" style="background-image:  url('{{ $noticia->portada ? asset ("img/noticias/portadas/". $noticia->portada ) : "https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg" }}')">
                <div class="mw-full h-80 px-8 flex flex-col justify-center">
                        <h1 class=" text-1xl text-white leading-8 font-bold">
                            <a href="{{route('noticia', $noticia)}}">
                                {!!$noticia->entradilla!!}
                            </a>
                        </h1>
                        <div>
                            <p class="text-base font-semibold text-gray-900">{!!$noticia->titulo!!}</p>
                        </div>                             
                    </div>
                </article>                   
            @endforeach
        </div> 
        <div class=" mt-4" >
            {{ $noticias->links() }}
        </div>        
    </div> 
</x-app-layout>