<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    
    use HasFactory;

    protected $guarded = ['id','created_at','update_at'];
    
    
    /* Relacion de uno a muchos */
    public function multimedias(){
      return $this->hasMany(Multimedia::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
}
