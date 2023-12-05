<x-app-layout>
    <style>
        .contenedor{
            display: inline-block;
            text-align: center;
            }
        .centrado{
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Nuevos estilos para el carrusel */
        .owl-carousel {
            width: 100%;
        }

        .owl-item img {
            max-width: 100%;
        }
       
        
        .imagenautoridad{
            height: 130px;
            width: 120px;
            margin: auto
        }
        .imagen-fija {
        width: 400px; /* Ancho fijo del contenedor */
        height: 630px; /* Alto fijo del contenedor */
        overflow: hidden; /* Ocultar el contenido fuera del contenedor */
    }

    .imagen-fija img {
        width: 100%; /* Asegura que la imagen ocupe el 100% del contenedor */
        object-fit: cover; /* Recorta la imagen para ajustarla al contenedor */
    }

    .titulo-carrusel {
            position: absolute;
            top: 40%; /* Ajusta la posición vertical según tus preferencias */
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2; /* Asegura que el título esté sobre las imágenes */
            font-size: 44px; /* Estilo del título, ajusta según tus preferencias */
            font-weight: bold;
            color: rgb(0, 0, 0); /* Color del título */
        }

    </style>

    <head>
        <!-- Agrega estas referencias en la sección de encabezado -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    </head>
    <div class="container py-8">
        <br><br><br><br>
        {{-- <div>
            <div class="p-3 mb-2 font-bold bg-primary text-red-800 rounded float-right">
                <a href="{{ route('grupos') }}" class="btn btn-light">Volver a grupos</a>
            </div>
        </div> --}}

        <div class=" bg-cover px-4 py-2 bg-red-600  flex float-right">
            <p><a href="{{ route('gruposinvestigacion') }}"
                    class="btn btn-light text-sm italic font-bold text center">Volver a grupos</a> </p>
        </div>


        <h1 class="text-4xl font-bold text-gray-800 text-center">{!! $grupo->nombre !!}</h1> <br>
        <div class="ed-item no-padding">
            <p><strong>Código: </strong>{!! $grupo->codigo !!}</p>
        </div>
        <div class="ed-item no-padding">
            <p><strong>Siglas: </strong>{!! $grupo->siglas !!}</p>
        </div>
        <br>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Contenido Principal -->
            <div class="lg:col-span-2">
                <figure class="flex justify-center">
                    <a href="{{ asset('img/grupos-investigacion/' . $grupo->portada) }}" id="openImage" class="ed-item base-100 web-30 relative">
                        <img class="w-full h-80 object-cover object-center"   src="{{ asset('img/grupos-investigacion/' . $grupo->portada) }}" alt="">
                    </a>
                </figure>

                


                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>MISIÓN: </strong>{!! $grupo->mision !!}</p>
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>VISIÓN: </strong>{!! $grupo->vision !!}</p>
                </div>
                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>OBJETIVO: </strong>{!! $grupo->objetivo !!}</p>
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p class="mb-2"><strong class="text-xl font-bold text-gray-800">INTEGRANTES:</strong></p>

                    @foreach ($grupo->investigadores as $investigador)
                        <div class="text-base text-gray-500 mt-4 text-justify border-b pb-2">
                            <p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-lg font-semibold">{{ $investigador->nombre }}</p>
                                    <p class="text-sm">{{ $investigador->email }}</p>
                                </div>
                                <div class="text-center">
                                    {{ $investigador->tipo_investigador->descripcion }}
                                </div>
                                <div class="text-right">
                                    <!-- Otros detalles del investigador si es necesario -->
                                </div>
                            </div>
                            </p>
                        </div>
                    @endforeach
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p class="mb-2"><strong class="text-xl font-bold text-gray-800">LINEAS DE INVESTIGACIÓN:</strong>
                    </p>

                    @foreach ($grupo->lineas as $linea)
                        <p>
                            <strong>{{ $linea->descripcion }}</strong>
                            <br>
                            <strong>Programas de Investigación:</strong>
                        <ul>
                            @forelse ($linea->programasInvestigacion as $programa)
                                <li>{{ $programa->descripcion }}</li>
                            @empty
                                <li>No hay programas de investigación asociados.</li>
                            @endforelse
                        </ul>
                        </p>
                    @endforeach
                </div>


                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p class="mb-2"><strong class="text-xl font-bold text-gray-800">GALERIA DE IMÁGENES:</strong>
                    </p>
                    <div class="">
                        @foreach ($grupo->galeriaImagenes as $imagen)
                            <div class="item">
                                <img src="{{ asset('img/grupos-investigacion/galeria/' . $imagen->imagen_path) }}" alt="Imagen de la galería">
                        
                            </div>
                            
                        @endforeach
                    </div>      
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


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

     
    $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items: 1, // Cantidad de elementos a mostrar
                loop: true, // Repetir el carrusel
                autoplay: true, // Reproducción automática
                autoplayTimeout: 1000, // Tiempo de espera entre diapositivas en milisegundos
                autoplayHoverPause: true, // Pausar en el paso del ratón
                nav: true, // Flechas de navegación
                dots: false, // Indicadores de diapositiva
            });
        });
</script>
