<x-app-layout>
    <div class="container  py-8">
     <div>
         <br>
         <BR>
         <h1 class="text-4xl font-extrabold text-gray-900 text-center ">crear un  Grupal</h1>
         <br>
     </div>
     <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Crear Nuevo Grupo</h2>
        <form action="{{ route('group-chats.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Nombre del Grupo</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border w-full rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Descripción</label>
                <textarea name="description" id="description" class="mt-1 p-2 border w-full rounded-md" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Imagen</label>
                <input type="text" name="image" id="image" class="mt-1 p-2 border w-full rounded-md">
            </div>
            
            <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded-md">Crear Grupo</button>
            
        </form>

        <div>
            <br>
            <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-6 py-3 rounded-full mr-4">
                Ir Atrás
            </a>
        </div>
             
        
    </div>
</x-app-layout>