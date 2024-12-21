<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    use HasFactory;
    protected $table = 'titulacion';
    protected $primaryKey = 'id';


    protected $fillable = [
        'descripciont',
        'resumen',
        'portada',        
        'tipo_titulacion_id'
        
    ];

    protected $hidden = [
        'id',
        'tipo_titulacion_id',
     ];
     
    public $timestamps = false;

  /*   Relacion de uno a muchos inversa */
  public function tipo_titulacion(){
    return $this->belongsTo(TipoTitulacion::class);
  }
}
