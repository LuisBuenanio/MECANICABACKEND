<x-app-layout>
    
    <div class="container py-8">

        <br><br><br><br>
        <h1 class="text-4xl font-bold text-gray-800 text-center" >{!!$docente->nombre!!}</h1> <br>
        
       
        <div class="ed-item no-padding">
            <br><p><strong>Titulos: </strong>{!!$docente->titulo!!}</p> 
            </div>
        <br>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 ">
           
            <!-- contenido Principal -->
            <div class="lg:col-span-2">
                <figure class="flex justify-center">
                    @if(asset('img/docentes/'.$docente->foto)) 
                        <a href="{{asset('img/docentes/'.$docente->foto)}}" class="ed-item base-100 web-30">
                            <img class ="w-full h-80 object-cover object-center" src="{{asset('img/docentes/'.$docente->foto)}}" alt="">
                        </a>
                    @else
                        <a href="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg" class="ed-item base-100 web-30">
                            <img class ="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg" alt="">
                        </a>
                    @endif

                </figure>


                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Asignaturas que imparte: </strong> {!!$docente->asignatura!!}
                </div>
                
                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Resumen Laboral: </strong>  {!!$docente->descripcion!!}
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Hoja de Vida: </strong>                
                    <a href="{{ asset('docs/docentes/'.$docente->hoja_vida) }}" target="_blank"> {{ $docente->hoja_vida}}<i class=" fa fa-file-pdf-o" aria-hidden="true"></i></a></p>
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p class="font-bold text-black"><strong>Contactos: </strong>  
                        <p><strong>Email: </strong> {!!$docente->email!!}
                           &nbsp; <strong>Teléfono: </strong> {!!$docente->telefono!!}
                                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>