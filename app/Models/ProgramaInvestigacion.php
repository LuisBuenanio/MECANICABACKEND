<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaInvestigacion extends Model
{
    use HasFactory;

    protected $table = 'programas_investigacion';
	protected $primaryKey = 'id';


    protected $fillable = [
        'descripcion',
        'estado',
    ];

    protected $hidden = [
        'id',
     ];

    public $timestamps = false;

    public function lineasn()
    {
        return $this->belongsToMany(LineaInvestigacion::class);
    }
    
}
