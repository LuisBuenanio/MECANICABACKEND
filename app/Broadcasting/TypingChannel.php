<?php

namespace App\Broadcasting;

use App\Models\User;
use App\Models\Chatroom;

class TypingChannel
{
    public function __construct()
    {
        //
    }

    public function join(User $user, Chatroom $chatroom)
    {
        return $chatroom->users->contains($user);
    }
}
