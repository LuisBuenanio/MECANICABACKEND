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
        'estado',
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
    
    /*   Relacion de uno a muchos inversa */
    public function tipo_investigador(){
      return $this->belongsTo(TipoInvestigador::class);
    }

    /*   Relacion de muchos a muchos inversa */
    public function gruposInvestigacion(){
      return $this->belongsToMany(GrupoInvestigacion::class);
    }

}
