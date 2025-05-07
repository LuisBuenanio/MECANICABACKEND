<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyecto';
    protected $primaryKey = 'id';


    protected $fillable = [
        'codigo',
        'nombre',
        'objetivo',
        'coordinador',
        'estado',
        'ejecutandose',
        'tipo_proyecto_id'
        
    ];

    protected $hidden = [
        'id',
        'tipo_proyecto_id',
     ];
     
    public $timestamps = false;

  /*   Relacion de uno a muchos inversa */
  public function tipo_proyecto(){
    return $this->belongsTo(TipoProyecto::class);
  }

  
}
