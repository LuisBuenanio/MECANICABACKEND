<x-app-layout>
    <br><br><br>
    <h1 class="text-4xl font-extrabold text-gray-900 text-center ">TITULACIÓN</h1>

    <div class="container py-8">
                
        <div class="text-base text-gray-500 mt-4 text-justify">
            <p>{!! $titulacion->descripciont !!}</p>
        </div>

        <br>
        <figure class="flex justify-center">
            <img class="w-25 h-80 object-cover object-center web-30 ed-item base-100 web-30 relative " src="{{ asset('img/titulacion/'.$titulacion->portada) }}" alt="">
            
        </figure>  

        <div class="text-base text-gray-500 mt-2 text-justify">
            <p><strong>{!! $titulacion->resumen !!} </strong></p>
        </div>

                                  
            @foreach($tipo_titulaciones as $tipo_titulacion)
            <div class="text-base text-gray-500 mt-4 text-justify">
                <p><strong>{!! $tipo_titulacion->descripcion !!} : </strong>
                    <a href="{{ asset('docs/titulacion/tipos/'.$tipo_titulacion->documento) }}" target="_blank">{{ $tipo_titulacion->documento }}<i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                </p>
            </div>                 
            @endforeach
       

             
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
