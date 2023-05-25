<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoInvestigacion extends Model
{
    use HasFactory;
    protected $table = 'grupo_investigacion';
	protected $primaryKey = 'id';
    
    protected $fillable = [
        'codigo',
        'nombre',
        'siglas',        
        'mision',
        'vision',
        'estado',
    ];
    
    protected $hidden = [
        'id'
     ];

    /* Relacion de uno a muchos */
    public function linea_investigacion(){
      return $this->hasMany(LineaInvestigacion::class);
    }
    /* Relacion de uno a muchos */
    public function programa_investigacion(){
        return $this->hasMany(ProgramaInvestigacion::class);
    }
    /* Relacion de uno a muchos */
    public function investigador(){
        return $this->hasMany(Investigador::class);
    }
}
