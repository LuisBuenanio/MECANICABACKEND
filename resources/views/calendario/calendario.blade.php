<x-app-layout>
    <x-slot name="header">
        <br>
        <br>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Próximos Eventos</h1>

                @forelse ($eventosPublicados as $evento)
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">{{ $evento->titulo }}</h2>
                        <p class="text-gray-600">Fecha:
                            {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('Y-m-d') }}</p>
                    </div>
                @empty
                    <p>No hay eventos próximos.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="container py-8 sm:rounded-lg ">
        <h1 class="text-2xl font-extrabold text-gray-900 text-center mb-4">CALENDARIO DE EVENTOS</h1>
        <div id="calendar"></div>
    </div>

    <style>
        .container {
    border: 2px solid rgb(53, 53, 71); /* Color azul (#3490dc) y grosor (2px) del borde */
    border-radius: 8px; /* Añade esquinas redondeadas para un mejor aspecto */
    padding: 10px; /* Añade espacio interno para mejorar el aspecto visual */
}
        .evento-dia {
            background-color: #ffc0cb;
            /* Cambia el color de fondo de los días con eventos */
        }

        #eventoModal .bg-white {
            background-color: rgb(250, 157, 157);
            /* Cambia el color de fondo del contenido del modal */
        }

        #eventoModal .text-xl {
            color: #000;
            /* Cambia el color del texto del título */
        }

        #eventoModal .text-gray-500:hover {
            color: #fd0505;
            /* Cambia el color del texto del botón al pasar el ratón por encima */
        }

        .evento-con-borde {
            border: 3px solid #f70606;
            /* Define el estilo del borde */
            padding: 10px;
            /* Añade espacio interno para mejorar el aspecto visual */
        }
    </style>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');



            const calendar = new FullCalendar.Calendar(calendarEl, {
                height: '90vh',
                eventClassNames: 'evento-con-borde',
                initialView: 'dayGridMonth',
                locale: 'es',
                events: @json($events),
                eventContent: function(arg) {
                    const horaInicio = arg.event.start.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    const horaFinal = arg.event.end.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    return {
                        html: `<div class="event-content">
                              <p class="event-time">${horaInicio} - ${horaFinal}</p>
                              <p class="event-title">${arg.event.title}</p>  
                           </div>`
                    };
                },
                eventClick: function(info) {


                    const descripcionEvento = info.event.extendedProps.description;
                    const horaInicio = info.event.start.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    const horaFinal = info.event.end.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });


                    // Muestra el modal con la descripción del evento
                    document.getElementById('horaInicio').innerText = `Hora de inicio: ${horaInicio}`;
                    document.getElementById('descripcionEvento').innerText =
                        `Descripcion: ${descripcionEvento}`;
                    document.getElementById('horaFinal').innerText = `Hora final: ${horaFinal}`;

                    document.getElementById('eventoModal').classList.remove('hidden');

                },
                eventClassNames: function(arg) {
                    return ['evento-dia']; // Agrega la clase 'evento-dia' a los días con eventos
                }
            });

            calendar.render();
        });
    </script>


    <div id="eventoModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-30">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg p-6">
                <div class="flex justify-between items-center">
                    <h5 class="text-xl font-bold mb-4">Detalles del Evento</h5>
                    <button onclick="document.getElementById('eventoModal').classList.add('hidden')"
                        class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p id="horaInicio"></p>
                <p id="descripcionEvento"></p>
                <p id="horaFinal"></p>
            </div>
        </div>
    </div>

</x-app-layout>
