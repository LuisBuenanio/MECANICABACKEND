<?php

namespace App\Observers;

use App\Models\Noticia;
use Illuminate\Support\Facades\Storage;

class NoticiaObserver
{
    
    public function created(Noticia $noticia)
    {
        //
    }

    public function deleting(Noticia $noticia)
    {
        if($noticia->image){
            Storage::delete($noticia->image->url);
        }
    }

}
