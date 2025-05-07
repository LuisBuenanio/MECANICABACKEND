<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChatMember extends Model
{
    protected $fillable = [
        'group_chat_id',
        'user_id',
        'is_admin',
        'mute_notifications',
        'status',
    ];

    // Relación con el grupo al que pertenece el miembro
    public function groupChat()
    {
        return $this->belongsTo(GroupChat::class, 'group_chat_id');
    }

    // Relación con el usuario que es miembro del grupo
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
