<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;
    protected $table = 'escuela';
    protected $primaryKey = 'id';

    protected $guarded = ['id','created_at','update_at'];
    
    protected $fillable = [
        'nombre',
        'mision',
        'vision',
        'telefono',
        'email',
        'mapa',
        'direccion',
        'malla',
        'duracion',
        'perfil',
        'campo',
        'titulo',
        'modalidad',
        'fecha_creacion',
        'logo_escuela'
    ];
}
