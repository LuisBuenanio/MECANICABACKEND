<x-app-layout>
    <div class="container  py-8">
     <div>
         <br>
         <BR>
         <h1 class="text-4xl font-extrabold text-gray-900 text-center ">CHAT GRUPALES</h1>
         <br>
     </div>
     <h2 class="text-2xl font-semibold mb-4">Grupo: {{ $group->name}}</h2>
    <div class="flex flex-col h-64 overflow-y-auto space-y-4">
        @livewire('group-messages', ['groupId' => $group->id])
    </div>
    @livewire('send-group-message', ['groupId' => $group->id])

    <h3>Miembros del Grupo:</h3>
        <ul>
            @foreach($group->members as $member)
                <li>{{ $member->name }}</li>
            @endforeach
        </ul>

        {{-- Enlace al formulario de agregar miembros (solo visible para el administrador) --}}
        @if($group->created_by == Auth::id())
            <a href="{{ route('group_chats.add_member_form', $group) }}">Agregar Miembro</a>
        @endif

        <a href="{{ route('group_chats.add_member_form', $group) }}">Agregar Miembro</a>

</x-app-layout>
