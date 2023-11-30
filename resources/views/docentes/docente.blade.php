<x-app-layout>
    <div class="container py-8">
        <br><br><br><br>
        <div class=" bg-cover px-4 py-2 bg-red-600  flex float-right">
            <p><a href="{{ route('docentes') }}" class="btn btn-light text-sm italic font-bold text center">Volver a Docentes</a> </p>
        </div>  
        <h1 class="text-4xl font-bold text-gray-800 text-center">{!! $docente->nombre !!}</h1> <br>

        <div class="ed-item no-padding">
            <br><p><strong>Titulos: </strong>{!! $docente->titulo !!}</p>
        </div>
        <br>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Contenido Principal -->
            <div class="lg:col-span-2">
                <figure class="flex justify-center">
                    <a href="{{ asset('img/docentes/'.$docente->foto) }}" id="openImage" class="ed-item base-100 web-30 relative">
                        <img class="w-full h-80 object-cover object-center" src="{{ asset('img/docentes/'.$docente->foto) }}" alt="">
                    </a>
                </figure>               

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Asignaturas que imparte: </strong>{!! $docente->asignatura !!}</p>
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Resumen Laboral: </strong>{!! $docente->descripcion !!}</p>
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Hoja de Vida: </strong>
                        <a href="{{ asset('docs/docentes/'.$docente->hoja_vida) }}" target="_blank">{{ $docente->hoja_vida }}<i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                    </p>
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p class="font-bold text-black"><strong>Contactos: </strong>
                        <p><strong>Email: </strong> {!! $docente->email !!}
                            &nbsp; <strong>Teléfono: </strong> {!! $docente->telefono !!}
                        </p>
                    </p>
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
