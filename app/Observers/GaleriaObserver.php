<?php

namespace App\Observers;

use App\Models\Galeria;
use Illuminate\Support\Facades\Storage;

class GaleriaObserver
{
    
    public function created(Galeria $galeria)
    {
        //
    }

    public function deleting(Galeria $galeria)
    {
        if($galeria->portada){
            public_path("img/galeria_port/")::delete($galeria->portada);
        }
    }

}
