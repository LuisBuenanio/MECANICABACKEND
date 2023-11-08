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
                        <a href="{{($noticia->image->url) }}" id="openImage" class="ed-item base-100 web-30 relative">
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
