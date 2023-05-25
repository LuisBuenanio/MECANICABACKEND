<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Integrante extends Model
{
    use HasFactory;
    protected $table = 'integrante';
	  protected $primaryKey = 'id';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		    'nombre',
        'telefono',
        'foto',
        'email',
        'estado',
        'asociacion_id',
        'tipo_integrante_id'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'id',
       'asociacion_id',
        'tipo_integrante_id'
    ];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /*   Relacion de uno a muchos inversa */
  public function tipo_integrante(){
    return $this->belongsTo(TipoIntegrante::class);
  }

  /*   Relacion de uno a muchos inversa */
  public function asociacion(){
    return $this->belongsTo(Asociacion::class);
  }

  
  
}
