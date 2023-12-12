<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestria extends Model
{
    use HasFactory;
    protected $table = 'maestrias';
    protected $primaryKey = 'id';



    protected $fillable = [
        'nombre',
        'titulo',
        'foto',
        'perfil_ingreso',
        'perfil_profesional',
        'objetivo',
        'duracion',
        'malla',
        'modalidad',
        'formacion',
        'estado'        
    ];

    protected $hidden = [
        'id',
     ];
     
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'nombre';
    }
}
