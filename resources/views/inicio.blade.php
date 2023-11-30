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
       
        .imagenmv{
            background-image: url("{{asset('img/escuela/'.$escuela->logo_escuela ?? 'sin logo')}}");
            height: 200px;
            width: 200px;
            margin: auto

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
    
    {{--Header con imagen stática--}}
   {{--  <div class="contenedor">
        <img class="w-full h-screen "src="{{ asset('img/portada/lab_mecanica.jpg') }}" alt="portada"/>
        <div class="centrado py-8 text-4xl font-bold  text-center  text-black">MECÁNICA</div>
    </div> --}}

    <div class="titulo-carrusel">Mecánica</div>
    <div class="owl-carousel owl-theme imagen-fija">
        <div class="item "><img src="{{ asset('img/slider/06.jpeg') }}" alt="imagen1"></div>
        <div class="item "><img src="{{ asset('img/slider/lab_mecanica.jpg') }}" alt="imagen2"></div>
        <div class="item "><img src="{{ asset('img/slider/prueba.jpg') }}" alt="imagen3"></div>
        <div class="item "><img src="{{ asset('img/slider/team_mecanica.jpg') }}" alt="imagen3"></div>
      <!-- Agrega más imágenes según sea necesario -->
    </div>
    
    
    {{-- <!-- Seccion de ultimas noticias --> --}}    


    <div class="container  py-8">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-900 text-center ">Últimas Noticias</h1>
            <br>
        </div>            
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">                            
            @foreach($noticias as $noticia)
                <article class="w-full h-80 bg-cover bg-center" style="background-image:  url(@if($noticia->image) {{ ($noticia->image->url)}} @else https://cdn.pixabay.com/photo/2016/07/28/16/50/car-engine-1548434_960_720.jpg @endif )">
                    <div class="w-full h-80 px-8 flex flex-col justify-center">
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

        <div class=" mt-8 flex justify-center " >
            <div class=" bg-cover px-4 py-2 bg-red-600 ">
            <p><a class="text-sm italic font-bold text center py-2" href="{{url('noticias')}}">Ver más noticias</a></p>                     </div>    
        </div>     
    </div>

    {{-- Misión y Visión de la Carrera --}}
    <div class="container py-4">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-900 text-center ">Misión y Visión</h1>
            <br>
        </div> 
        <div class="grid grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="w-full p-4 cols-start-2">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Misión</h2>
                <p class="text-base text-gray-700 mt-2 text-justify" > {!! $escuela->mision !!} </p>
            </div>
            <div class=" imagenmv bg-cover bg-center"></div>
            <div class="w-full p-4  cols-start-4">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Visión</h2>
                <p class="text-base text-gray-700 mt-2 text-justify"> {!! $escuela->vision !!} </p>
            </div>
        </div>        
    </div>
    {{-- Campo Perfil, modalidad --}}
    <div class="container py-4">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-900 text-center ">Información Relevante</h1>
            <br>
        </div> 
        <div class="grid grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="w-full p-4 cols-start-2">
                <h2 class="text-xl font-bold text-gray-800 text-center">Campo Ocupacional</h2>
                <p class="text-base text-gray-700 mt-2 text-justify" > {!! $escuela->campo !!} </p>
            </div>
            <div class="w-full p-4 cols-start-2">
                <h2 class="text-xl font-bold text-gray-800 text-center">Perfil Profesional</h2>
                <p class="text-base text-gray-700 mt-2 text-justify" > {!! $escuela->perfil !!} </p>
            </div>
            <div class="w-full p-4 bg-blue cols-start-4">
                <h2 class="text-xl font-bold text-gray-800 text-justify">Modalidad de Estudios</h2>
                <p class="text-base text-gray-700 text-justify"> {!! $escuela->modalidad !!} </p>
                <h2 class="text-xl font-bold text-gray-800 texty-justify">Duración de la Carrera</h2>
                <p class="text-base text-gray-700 text-justify"> {!! $escuela->duracion !!} </p>
                <h2 class="text-xl font-bold text-gray-800 text-justify">Título</h2>
                <p class="text-base text-gray-700 text-justify"> {!! $escuela->titulo !!} </p>
                <h2 class="text-xl font-bold text-gray-800 text-justify">Malla Curricular</h2>
                <p class="text-base text-gray-700 text-rigth"><a href="{{ asset('docs/escuela/'.$escuela->malla) }}" target="_blank"> {{ $escuela->malla}}<i class=" fa fa-file-pdf-o" aria-hidden="true"></i></a></p>
            </div>
        </div>        
    </div>
    {{-- Autoridades de la Escuela y Facultad --}}
    <div class="container  py-8">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-900 text-center ">Autoridades de la Facultad</h1>
            <br>
        </div>
        <div class="grid grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($autoridades as $autoridad)
            
                <div class="p-4 cols-start-2 block">
                    @if ($autoridad->foto != "")
                                        <img src="{{ asset('img/autoridades/'.$autoridad->foto) }}" alt="" class="imagenautoridad rounded-lg bg-center bg-cover">
                                    @else
                                        <img src="{{ asset('img/autoridades/autoridad.png') }}" alt="" class="imagenautoridad block object-cover ">
                                    @endif
                    <h2 class="text-base font-bold text-gray-800 text-center">{{ $autoridad->nombre }}</h2>
                    <p class="text-base decoration-solid text-gray-800 mt-2 text-center" > {{ $autoridad->descripcion }} </p>
                </div>
            @endforeach
        
        </div>   
    </div>

    


    {{-- Contáctanos y datos de direccion de la carrera --}}
    <div class="container py-4">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-900 text-center ">Contáctanos</h1>
            <br>
        </div> 
        <div class="grid grid-cols-4 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="w-full p-4 cols-start-2">
                <h2 class="text-2xl font-bold text-gray-800 mt-4 py-4 text-center">Como llegar</h2>
                <iframe width="600" height="250" frameborder="0" style="border:0" src="{{ $escuela->mapa }}" allowfullscreen></iframe>
            </div>
            <div class=""></div>
            <div class="w-full p-4  cols-start-4">
                <h2 class="text-2xl font-bold text-gray-800 mt-4 py-4 text-center">Ubicación</h2>
                <p class="font-bold" >Dirección:</p> <p>{{ $escuela->direccion }}</p>
                <p class="font-bold" >Email:</p> <p>{{ $escuela->email }}</p>
                <p class="font-bold" >Tel:</p> <p>{{ $escuela->telefono }}</p>
                
            </div>
        </div>        
    </div>   

    <script>
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
</x-app-layout>