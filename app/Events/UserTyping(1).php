<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserTyping implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $chatroomId;
    public $userId;

    public function __construct($chatroomId, $userId)
    {
        $this->chatroomId = $chatroomId;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new Channel('chatroom.' . $this->chatroomId);
    }

    public function broadcastWith()
    {
        return [
            'user_id' => $this->userId,
        ];
    }
}
