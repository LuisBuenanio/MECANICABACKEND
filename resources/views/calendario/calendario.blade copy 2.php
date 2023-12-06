<x-app-layout>
    <head>
        <title>Calendario de Eventos</title>
        <link rel="stylesheet" href="{{ asset('css/fullcalendar/core/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/fullcalendar/daygrid/main.css') }}" />
        <script src="{{ asset('js/fullcalendar/core/main.js') }}"></script>
        <script src="{{ asset('js/fullcalendar/daygrid/main.js') }}"></script>
        <script src="{{ asset('js/fullcalendar/lang/es.js') }}"></script>
   </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Próximos Eventos</h1>

                @forelse ($eventos as $evento)
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">{{ $evento->titulo }}</h2>
                        <p class="text-gray-600">{{ $evento->descripcion }}</p>
                        <p class="text-gray-600">Fecha: {{ $evento->fecha_inicio }} - {{ $evento->fecha_fin}}</p>
                    </div>
                @empty
                    <p>No hay eventos próximos.</p>
                @endforelse
            </div>
        </div>
    </div>
    
    <div class="container py-8">        
        <div id='calendario'></div>
    </div>  

    <script src="{{ asset('js/calendario.js') }}" defer></script>
    <script type="text/javascript">
</x-app-layout>




