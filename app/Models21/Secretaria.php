<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'secretarias';
    protected $primaryKey = 'id';

    protected $guarded = ['id','created_at','update_at'];
    
    protected $fillable = [
        'nombre_secretaria',
    ];
}
