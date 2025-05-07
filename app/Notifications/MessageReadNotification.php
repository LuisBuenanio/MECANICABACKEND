<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

class MessageReadNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $chatroomId;
    protected $userId;

    /**
     * Create a new notification instance.
     *
     * @param int $chatroomId
     * @param int $userId
     */
    public function __construct($chatroomId, $userId)
    {
        $this->chatroomId = $chatroomId;
        $this->userId = $userId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param mixed $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'chatroom_id' => $this->chatroomId,
            'user_id' => $this->userId,
        ]);
    }
}
