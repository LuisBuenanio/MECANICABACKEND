<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = ['image_path'];


    //Relacion 

    public function noticia(){
        return $this->belongsTo(Noticia::class);
    }
}
