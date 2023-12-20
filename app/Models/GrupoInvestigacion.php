<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoInvestigacion extends Model
{
    use HasFactory;
    
    protected $table = 'grupos_investigacion';
	protected $primaryKey = 'id';
    
   /*  protected $fillable = [
        'codigo',
        'nombre',
        'siglas',        
        'mision',
        'vision',
        'estado',
        'objetivo',
    ];
    
    protected $hidden = [
        'id'
     ]; */

     protected $guarded = ['id','created_at','update_at'];
    
    public function investigadores()
    {
        return $this->belongsToMany(Investigador::class, 'grupo_investigacion_investigador', 'grupo_investigacion_id', 'investigador_id');
    }

  
    public function lineasInvestigacion()
    {
        return $this->belongsToMany(LineaInvestigacion::class, 'grupo_investigacion_linea_investigacion');
    }

    public function programasInvestigacion()
    {
        return $this->belongsToMany(ProgramaInvestigacion::class, 'grupo_investigacion_programa_investigacion');
    }

    public function galeria_imagenes()
    {
        return $this->hasMany(GaleriaImagen::class);
    }


    public function getRouteKeyName()
    {
        return 'codigo';
    }
}
