<?php

// app/Http/Livewire/GroupMessages.php

namespace App\Http\Livewire;

use App\Models\GroupChatMessage;
use Livewire\Component;
use Livewire\WithPagination;

class GroupMessages extends Component
{
    use WithPagination;

    public $groupId;

    public function render()
    {
        $messages = GroupChatMessage::where('group_chat_id', $this->groupId)
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Ajusta el número según tus necesidades

        return view('livewire.group-messages', ['messages' => $messages]);
    }

    public function loadMore()
    {
        $this->page++;
    }
}
