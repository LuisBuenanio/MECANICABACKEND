<!-- resources/views/livewire/send-group-message.blade.php -->

<div>
    <textarea wire:model="message" class="w-full p-2 border rounded-md" placeholder="Escribe un mensaje"></textarea>
    <button wire:click="sendMessage" class="bg-red-700 text-white px-4 py-2 rounded-md">Enviar</button>

    <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-6 py-3 rounded-full mr-4">
        Ir Atrás
    </a>
</div>
