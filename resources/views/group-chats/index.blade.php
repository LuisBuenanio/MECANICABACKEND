
<x-app-layout>
    <div class="container  py-8">
     <div>
         <br>
         <BR>
         <h1 class="text-4xl font-extrabold text-gray-900 text-center ">CHAT GRUPALES</h1>
         <br>
     </div>
     <div class="fixed bottom-4 right-4">
        <a href="{{ route('group-chats.create') }}" class="bg-red-700 content-center text-white px-6 py-3 rounded-full shadow-md">
            Nuevo Chat
        </a>
    </div>
    <br>
     <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Lista de Grupos</h2>

        
        <div class="grid grid-cols-2 gap-4">
            @foreach($groups as $group)
                <a href="{{ route('group-chats.show', $group->id) }}" class="bg-white p-4 rounded-md shadow-md flex items-center space-x-4">
                    <img src="{{ $group->image_url }}" alt="{{ $group->name }}" class="w-12 h-12 object-cover rounded-full">
                    <div>
                        <h4 class="text-lg font-semibold">{{ $group->name }}</h4>
                        <p class="text-gray-500">{{ $group->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>

