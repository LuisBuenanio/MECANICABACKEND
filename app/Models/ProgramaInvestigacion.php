<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaInvestigacion extends Model
{
    use HasFactory;

    protected $table = 'programas_investigacion';
	protected $primaryKey = 'id';


    protected $fillable = [
        'descripcion',
        'estado',
        'linea_investigacion_id'
    ];

    protected $hidden = [
        'id',
     ];

    public $timestamps = false;

    public function lineaInvestigacion()
    {
        return $this->belongsTo(LineaInvestigacion::class);
    } 


    
    public function gruposInvestigacion()
    {
        return $this->belongsToMany(GrupoInvestigacion::class, 'linea_investigacion_programa_investigacion');
    }

    
}
