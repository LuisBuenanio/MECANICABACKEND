<!-- resources/views/livewire/group-messages.blade.php -->

<div>
    @foreach($messages as $message)
        <div class="flex items-start space-x-2">
            <img src="{{ $message->user->avatar }}" alt="{{ $message->user->name }}" class="w-8 h-8 object-cover rounded-full">
            <div>
                <p class="font-semibold">{{ $message->user->name }}</p>
                <p>{{ $message->content }}</p>
            </div>
        </div>
    @endforeach
    @if ($messages->hasMorePages())
        <button wire:click="loadMore" class="bg-red-700 text-white px-4 py-2 rounded-md mt-4">Cargar más mensajes</button>
    @endif
</div>
