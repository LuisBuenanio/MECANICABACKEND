<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class MessageRead implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chatroom.' . $this->message->chatroom_id);
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->message->id,
            'chatroom_id' => $this->message->chatroom_id,
            'user_id' => $this->message->user_id,
            'read_at' => $this->message->read_at,
        ];
    }
}
