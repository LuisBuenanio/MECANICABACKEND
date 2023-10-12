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
    </style>
    
    
    {{--Header con imagen stática--}}
    <div class="contenedor">
        <img class="w-full h-screen "src="{{ asset('img/portada/lab_mecanica.jpg') }}" alt="portada"/>
        <div class="centrado py-8 text-4xl font-bold  text-center  text-black">MECÁNICA</div>
    </div>

    
    
    {{-- {{-- Header y contenido slider --}}
    {{-- <div>
        <head>
            <meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"rel="stylesheet"/>
            <!-- Swiper's CSS -->
            <link rel="stylesheet"href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        </head>
        
        <div>
            <div class="swiper mySwiper">
            
            <p class=" py-8 text-4xl font-bold  object-none  text-center  text-gray-900">FACULTAD DE MECÁNICA</p>
             
            <div class="swiper-wrapper">
                
                @foreach ($sliders as $slider) 
                
                <div class="swiper-slide">
                    <img class="object-none w-full h-screen "src="{{ asset('img/slider/'.$slider->s_imagen) }}" alt="{{$slider->s_imagen}}"/>
                    
                              
                </div>         
                @endforeach
            </div>
            <div >
                <p class=" text-4xl font-bold z-0 text-center place-self-center text-gray-900">ESCUELA DE INGENIERÍA MECÁNICA</p>
            </div>
            </div>
        
            <!-- Swiper JS -->
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <script>
            var swiper = new Swiper('.mySwiper', {
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                },
            });
            </script>
        </div>
    </div> --}}

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
            <p><a class="text-sm italic font-bold text center py-2" href="{{url('noticias')}}">Ver más noticias</a></p>         
        
            </div>    
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
                <p class="text-base text-gray-700 text-rigth"><a href="{{ asset('docs/escuela/'.$escuela->malla) }}"> {{ $escuela->malla}}<i class=" fa fa-file-pdf-o" aria-hidden="true"></i></a></p>
            </div>
        </div>        
    </div>
    {{-- Autoridades de la Escuela y Facultad --}}
    <div class="container  py-8">
        <div>
            <br>
            <h1 class="text-2xl font-extrabold text-gray-900 text-center ">Autoridades</h1>
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

    
</x-app-layout>