<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;
    protected $table = 'investigador';
	  protected $primaryKey = 'id';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'nombre',
        'email',
        'estado',
        'grupo_investigacion_id',
        'tipo_integrante_id'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id',
       'grupo_investigacion_id',
        'tipo_integrante_id'
    ];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /*   Relacion de uno a muchos inversa */
  public function tipo_investigador(){
    return $this->belongsTo(TipoInvestigador::class);
  }

  /*   Relacion de uno a muchos inversa */
  public function grupo_investigacion(){
    return $this->belongsTo(GrupoInvestigacion::class);
  }

}
