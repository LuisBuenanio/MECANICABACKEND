<x-app-layout>
   <div class="container  py-8">
    <div>
        <br>
        <br>
        <br>
        <h1 class="text-4xl font-bold text-gray-800 text-center">SECRETARÍA</h1>
         <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
        <h1 class="text-2xl font-bold text-gray-800 text-left">CONTACTOS:</h1> 
        <br>
            <div class="text-base text-gray-500 mt-4 text-justify">
                <p><strong>Secretaria: </strong>{!! $secretaria->nombre_secretaria !!}</p>
            </div>
            
            <!-- Contenido Principal -->
            <div class="lg:col-span-2">
                <figure class="flex justify-center">
                    <a href="{{ asset('img/secretaria/'.$secretaria->foto_secretaria) }}" id="openImage" class="ed-item base-100 web-30 relative">
                        <img class="w-full h-80 object-cover object-center " src="{{ asset('img/secretaria/'.$secretaria->foto_secretaria) }}" alt="">
                    </a>
                </figure>  
                          

                
                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Teléfono de contacto: </strong>{!! $secretaria->telefono_secretaria !!}</p>
                </div>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Email de Contacto: </strong>{!! $secretaria->email_secretaria !!}</p>
                </div>                
            </div>
        </div>
    </div>
    <div>
        <br>
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-3">            
            <h1 class="text-2xl font-bold text-gray-800 text-left">MODELO DE OFICIOS:</h1> 
                
                <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Oficio de: </strong>{!! $secretaria->nombre_documento !!}</p>
                </div>                                 
             <div class="text-base text-gray-500 mt-4 text-justify">
                    <p><strong>Descripción: </strong>{!! $secretaria->detalle_documento !!}</p>
                </div>

                <div class="sppb-section">
                    <div class="sppb-row-container">
                        <div class="sppb-row">
                            <div class="sppb-col-md-12" id="column-wrap-id-1605704317457">
                                <div id="column-id-1605704317457" class="sppb-column">
                                    <div class="sppb-column-addons">
                                        <div id="sppb-addon-wrapper-1605704317461" class="sppb-addon-wrapper">
                                            <div id="sppb-addon-1605704317461" class="clearfix">
                                                <div class="sppb-addon sppb-addon-text-block">
                                                    <div class="sppb-addon-content">
                                                        <p>
                                                            <object data="{{ asset('docs/secretaria/'.$secretaria->documento) }}" type="application/pdf" width="100%" height="1000px">
                                                                <param name="view" value="Fit" />
                                                            </object>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
