<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $table = 'docentes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'telefono',
        'foto',
        'email',
        'titulo',
        'descripcion',
        'hoja_vida',
        'asignatura',
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
