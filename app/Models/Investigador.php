<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    use HasFactory;
    protected $table = 'investigadores';
	  protected $primaryKey = 'id';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		    'nombre',
        'email',
        'tipo_investigador_id'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id',
      'tipo_investigador_id'
    ];
    
    
    public $timestamps = false;

    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} ({$this->email})  {$this->tipo_investigador->descripcion}";
    }


    
    /*   Relacion de uno a muchos inversa */
    public function tipo_investigador(){
      return $this->belongsTo(TipoInvestigador::class);
    }

    /*   Relacion de muchos a muchos inversa */
    public function gruposInvestigacion(){
      return $this->belongsToMany(GrupoInvestigacion::class,'grupo_investigacion_investigador', 'investigador_id', 'grupo_investigacion_id');
    }

}
