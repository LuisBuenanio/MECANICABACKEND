<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    protected $table = 'multimedia';
	protected $primaryKey = 'id';


    protected $fillable = [
        'url',
        'nombre',
        'galeria_id'
    ];

    protected $hidden = [
        'id',
        'galeria_id',
     ];

    public $timestamps = false;

      /*   Relacion de uno a muchos inversa */
    public function galeria(){
        return $this->belongsTo(Galeria::class);
    }

   /*  public function getRouteKeyName()
    {
        return 'nombre';
    } */
}
