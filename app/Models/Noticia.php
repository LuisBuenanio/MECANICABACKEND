<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Noticia extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','update_at'];

    //Relacion 1 a 1 Polimorfica para imagenes

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
