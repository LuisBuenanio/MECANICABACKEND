<?php

namespace App\Policies;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticiaPolicy
{
    use HandlesAuthorization;

   
    public function published(?User $user, Noticia $noticia){
        if($noticia->estado == 2){
            return true;
        }else{
            return false;
        }
    }
}
