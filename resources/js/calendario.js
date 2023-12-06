// resources/js/calendario.js

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin],
        events: [
            // Aquí deberías pasar los eventos desde tu controlador o base de datos
            {
                title: 'Evento 1',
                start: '2023-12-01',
            },
            {
                title: 'Evento 2',
                start: '2023-12-15',
            },
            // ...
        ],
    });

    calendar.render();
});
