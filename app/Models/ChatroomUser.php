<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ChatroomUser extends Pivot
{
    protected $table = 'chatroom_user';

    protected $fillable = [
        'chatroom_id',
        'user_id',
    ];
}
