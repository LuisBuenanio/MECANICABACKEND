<x-app-layout>
    <div class="container py-8">
        <br><br><br><br>
        {{-- <div>
            <div class="p-3 mb-2 font-bold bg-primary text-red-800 rounded float-right">
                <a href="{{ route('maestrias') }}" class="btn btn-light">Volver a Maestrias</a>
            </div>
        </div> --}}
        
        <div class=" bg-cover px-4 py-2 bg-red-600  flex float-right">
            <p><a href="{{ route('maestrias') }}" class="btn btn-light text-sm italic font-bold text center">Volver a Maestrias</a> </p>
        </div>    
          
        
        <h1 class="text-4xl font-bold text-gray-800 text-center">{!! $maestria->nombre !!}</h1> <br>
         <div class="ed-item no-padding">
            <br><p><strong>Titulo que Otorga: </strong>{!! $maestria->titulo !!}</p>
            <p><strong>Modalidad de Estudio: </strong>{!! $maestria->modalidad !!}</p> 
            <p><strong>Formación Académica: </strong>{!! $maestria->formacion !!}</p>            
            <p><strong>Duración: </strong>{!! $maestria->duracion !!}</p>
        </div>
        <br>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Contenido Principal -->
            <div class="lg:col-span-2">
                <figure class="flex justify-center">
                    <a href="{{ asset('img/maestrias/'.$maestria->foto) }}" id="openImage" class="ed-item base-100 web-30 relative">
                        <img class="w-full h-80 object-cover object-center" src="{{ asset('img/maestrias/'.$maestria->foto) }}" alt="">
                    </a>
                </figure>               

                
                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Objetivo: </strong>{!! $maestria->objetivo !!}</p>
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Perfil de Ingreso: </strong>{!! $maestria->perfil_ingreso !!}</p>
                </div>
                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Perfil de Profesional: </strong>{!! $maestria->perfil_profesional !!}</p>
                </div>
                
                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Malla Curricular: </strong>
                        <a href="{{ asset('docs/maestrias/'.$maestria->malla) }}" target="_blank">{{ $maestria->malla }}<i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                    </p>
                </div>

                {{-- <div class="text-base text-gray-500 mt-4 text-justify">
                    <p class="font-bold text-black"><strong>Contactos: </strong>
                        <p><strong>Email: </strong> {!! $maestria->email !!}
                            &nbsp; <strong>Teléfono: </strong> {!! $maestria->telefono !!}
                        </p>
                    </p>
                </div> --}}
            </div>
        </div>
    </div>
    
</x-app-layout>
<style>
    #fullscreenImage {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 999;
        text-align: center;
    }

    #fullscreenImage img {
        max-width: 90%;
        max-height: 90%;
        margin: auto;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const openImage = document.getElementById("openImage");
        const fullscreenImage = document.createElement("div");
        fullscreenImage.id = "fullscreenImage";
        const image = document.createElement("img");
        image.src = openImage.getAttribute("href");

        openImage.addEventListener("click", function(e) {
            e.preventDefault();
            fullscreenImage.style.display = "block";
            fullscreenImage.appendChild(image);
            document.body.appendChild(fullscreenImage);
        });

        fullscreenImage.addEventListener("click", function() {
            fullscreenImage.style.display = "none";
            fullscreenImage.innerHTML = "";
        });
    });
</script>
