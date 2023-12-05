<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaImagen extends Model
{
    use HasFactory;
    protected $table = 'galeria_imagenes';

    protected $fillable = ['imagen_path'];

    public function grupoInvestigacion()
    {
        return $this->belongsTo(GrupoInvestigacion::class);
    }
}
