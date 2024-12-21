<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class UserTyping implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;

    public $chatroomId;
    public $userId;

    public function __construct(int $chatroomId, int $userId)
    {
        $this->chatroomId = $chatroomId;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chatroom.' . $this->chatroomId);
    }

    public function broadcastWith()
    {
        return [
            'chatroom_id' => $this->chatroomId,
            'user_id' => $this->userId,
        ];
    }
}
