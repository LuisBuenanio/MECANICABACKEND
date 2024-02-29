<?php


namespace App\Http\Livewire;

use App\Models\GroupChatMessage; // Ajusta el namespace
use Livewire\Component;

class SendGroupMessage extends Component
{
    public $groupId;
    public $message;

    public function render()
    {
        return view('livewire.send-group-message');
    }

    public function sendMessage()
    {
        GroupChatMessage::create([
            'group_chat_id' => $this->groupId,
            'user_id' => auth()->user()->id,
            'content' => $this->message,
        ]);

        $this->message = '';
    }
}
