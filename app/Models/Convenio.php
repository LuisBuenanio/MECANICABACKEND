<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;
    protected $table = 'convenio';
    protected $primaryKey = 'id';


    protected $fillable = [
        'resolucion',
        'nombre',
        'objetivo',
        'coordinador',
        'fecha_legalizacion',
        'vigencia',
        'estado',
        'tipo_convenio_id'
        
    ];

    protected $hidden = [
        'id',
        'tipo_convenio_id',
     ];
     
    public $timestamps = false;

  /*   Relacion de uno a muchos inversa */
  public function tipo_convenio(){
    return $this->belongsTo(TipoConvenio::class);
  }
}
