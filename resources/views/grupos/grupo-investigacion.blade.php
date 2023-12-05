<x-app-layout>   
    <div class="container py-8">
        <br><br><br><br>

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
                    
                    <figure class="flex justify-center">
                        @foreach ($grupo->galeriaImagenes as $imagen)
                        <div class="ed-item base-100 web-30 relative">
                            <img class="w-full h-80 object-cover object-center" 
                                 src="{{ asset('img/grupos-investigacion/galeria/' . $imagen->imagen_path) }}" 
                                 alt=""
                                 onclick="openModal('{{ asset('img/grupos-investigacion/galeria/' . $imagen->imagen_path) }}')">
                        </div>
                        @endforeach
                    </figure>
                    
                    <div id="myModal" class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <img class="modal-content" id="img01">
                    </div>
                    
                    <script>
                        function openModal(imagePath) {
                            document.getElementById('img01').src = imagePath;
                            document.getElementById('myModal').style.display = 'block';
                        }
                    
                        function closeModal() {
                            document.getElementById('myModal').style.display = 'none';
                        }
                    </script>
                    
                    
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

    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 50px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
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
    
        function openModal(imagePath) {
        document.getElementById('img01').src = imagePath;
        document.getElementById('myModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
</script>