<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridad extends Model
{
    use HasFactory;

    protected $table = 'autoridad';
    protected $primaryKey = 'id';


    protected $fillable = [
        'nombre',
        'telefono',
        'hoja_vida',
        'foto',
        'estado',
        'tipo_autoridad_id'
        
    ];

    protected $hidden = [
        'id',
        'tipo_autoridad_id',
     ];
     
    public $timestamps = false;

  /*   Relacion de uno a muchos inversa */
  public function tipo_autoridad(){
    return $this->belongsTo(TipoAutoridad::class);
  }
}
