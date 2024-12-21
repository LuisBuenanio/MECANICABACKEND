<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_type_id',
        'name',
        'image',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'room_users')->withPivot('isAdmin', 'isCreator');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
