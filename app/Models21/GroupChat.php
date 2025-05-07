<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    // Relación con los mensajes del grupo
    public function messages()
    {
        return $this->hasMany(GroupChatMessage::class, 'group_chat_id');
    }

    // Relación con los miembros del grupo
    public function members()
    {
        return $this->belongsToMany(User::class, 'group_chat_members')
            ->withPivot('is_admin', 'mute_notifications', 'status')
            ->withTimestamps();
    }

}