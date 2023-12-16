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
                    @foreach ($grupo->lineasInvestigacion as $linea)                        
                            <li>{{ $linea->descripcion }}</li> 
                    @endforeach
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p class="mb-2"><strong class="text-xl font-bold text-gray-800">PROGRAMAS DE INVESTIGACIÓN:</strong>
                    </p>
                    @foreach ($grupo->programasInvestigacion as $programa)                      
                            <li>{{ $programa->descripcion }}</li>    
                    @endforeach
                </div>
                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p class="mb-2"><strong class="text-xl font-bold text-gray-800">GALERIA DE IMÁGENES:</strong>
                    </p>
                    
                    <figure class="flex justify-center">
                        @foreach ($grupo->galeria_imagenes as $imagen)
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
                        <div class="modal-content-container">
                            <button class="nav-btn" onclick="prevImage()">Anterior</button>
                            <button class="nav-btn" onclick="nextImage()">Siguiente</button>
                        </div>
                        
                    </div>
                    
                    
                    
                    
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
    background-color: rgba(0, 0, 0, 0.8);

}

.modal-content-container {
    display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        background-color: transparent;
        border-radius: 5px;
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

.nav-btn {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
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

        var currentImageIndex = 0;
        var images = document.querySelectorAll('.ed-item img');
    
        function openModal(imagePath) {
        currentImageIndex = Array.from(images).findIndex(img => img.src === imagePath);
        showImage(currentImageIndex);
        document.getElementById('myModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    function showImage(index) {
        document.getElementById('img01').src = images[index].src;
    }

    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        showImage(currentImageIndex);
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        showImage(currentImageIndex);
    }

    // Cerrar modal haciendo clic fuera de la imagen o botones de navegación
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
