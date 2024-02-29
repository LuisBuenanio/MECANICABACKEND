<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChatMessage extends Model
{
    protected $fillable = [
        'group_chat_id',
        'user_id',
        'type',
        'body',
        'attachment',
        'seen',
    ];

    // Relación con el grupo al que pertenece el mensaje
    public function groupChat()
    {
        return $this->belongsTo(GroupChat::class, 'group_chat_id');
    }

    // Relación con el usuario que envió el mensaje
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación muchos a muchos con usuarios que han visto el mensaje
    public function viewers()
    {
        return $this->belongsToMany(User::class, 'group_chat_message_user', 'group_chat_message_id', 'user_id')
                    ->withTimestamps();
    }
}