<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;
    protected $table = 'lineas_investigacion';
	protected $primaryKey = 'id';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'descripcion',
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id',
    ];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

      /*   Relacion de uno a muchos inversa */
    public function gruposInvestigacion(){
        return $this->belongsToMany(GrupoInvestigacion::class);
    }

      /*   Relacion de uno a muchos inversa */
      public function programasInvestigacion(){
        return $this->belongsToMany(ProgramaInvestigacion::class);
    }
}
