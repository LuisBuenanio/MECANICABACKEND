<x-app-layout>
    <div class="container py-8">
        <br><br>
        <h1 class="text-2xl font-extrabold text-gray-900 text-center mb-4">DOCENTES</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($docentes as $docente)
                <article class="bg-white rounded-lg shadow-lg">
                    <div class="relative">
                        <br>
                        <img src="{{ asset('img/docentes/'.$docente->foto) }}" alt="Imagen del docente" class="w-1/2 h-1/2 mx-auto my-auto object-cover object-center rounded-t-lg">
                        <br>
                        <div class="p-4">
                            <h1 class="text-xl font-bold text-center text-black mb-2">
                                <a href="{{ route('docente', $docente) }}">
                                    {!! $docente->nombre !!}
                                </a>
                            </h1>
                            <div class="text-base text-center text-black">
                                {!! $docente->titulo !!}
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        {{ $docentes->links() }}
    </div>
</x-app-layout>
