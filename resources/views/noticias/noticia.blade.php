<x-app-layout>
    
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-800 text-center" >{!!$noticia->titulo!!}</h1> <br>
        
        <div class="text-lg text-gray-600 mb-2">
            {!!$noticia->entradilla!!}
        </div>
        <div class="ed-item no-padding">
        <br><p><strong>Fecha publicación: </strong>{{date("d-m-Y", strtotime($noticia->fecha_publicacion))}}</p> 
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 ">
           
            <!-- contenido Principal -->
            <div class="lg:col-span-2">
                <figure class="flex justify-center">
                    @if($noticia->image) 
                        <a href="{{($noticia->image->url) }}" class="ed-item base-100 web-30">
                            <img class ="w-full h-80 object-cover object-center" src="{{ ($noticia->image->url) }}" alt="">
                        </a>
                    @else
                        <a href="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg" class="ed-item base-100 web-30">
                            <img class ="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg" alt="">
                        </a>
                    @endif

                </figure>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    {!!$noticia->contenido!!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>