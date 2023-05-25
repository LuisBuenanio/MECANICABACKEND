<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaInvestigacion extends Model
{
    use HasFactory;

    protected $table = 'programa_investigacion';
	protected $primaryKey = 'id';


    protected $fillable = [
        'descripcion',
        'estado',
        'grupo_investigacion_id'
    ];

    protected $hidden = [
        'id',
        'grupo_investigacion_id',
     ];

    public $timestamps = false;

      /*   Relacion de uno a muchos inversa */
    public function grupo_investigacion(){
        return $this->belongsTo(GrupoInvestigacion::class);
    }
}
