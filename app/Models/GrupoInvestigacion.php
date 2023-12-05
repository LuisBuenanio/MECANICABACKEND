<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoInvestigacion extends Model
{
    use HasFactory;
    protected $table = 'grupos_investigacion';
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

    
    public function investigadores()
    {
        return $this->belongsToMany(Investigador::class);
    }

    public function lineas()
    {
        return $this->belongsToMany(LineaInvestigacion::class);
    }

    public function galeriaImagenes()
    {
        return $this->hasMany(GaleriaImagen::class);
    }


    public function getRouteKeyName()
    {
        return 'nombre';
    }
}
