<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociacion extends Model
{
    use HasFactory;
    protected $table = 'asociacion';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'mision',
        'vision',
        'telefono',
        'logo',
        'fecha_creacion',
        'fecha_cierre',
        'email',
        'facebook'
        
    ];

    protected $hidden = [
        'id',
     ];
     
    public $timestamps = false;

    /* Relacion de uno a muchos */
    public function integrante(){
        return $this->hasMany(Integrante::class);
    }
}
