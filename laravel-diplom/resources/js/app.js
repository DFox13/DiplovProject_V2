require('./bootstrap');

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [ dayGridPlugin, interactionPlugin ],
        initialView: 'dayGridMonth',
        events: [], // Здесь будут загружаться события
        eventColor: 'green', // Цвет событий
        selectable: true, // Возможность выбора даты
        select: function(info) {
            if (info.startStr) {
                var date = info.startStr;
                // Отправка выбранной даты на сервер
                fetch(`/add-visit-date`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ date: date })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        calendar.addEvent({
                            title: 'Посещение',
                            start: date,
                            color: 'green'
                        });
                        alert('Дата посещения добавлена успешно.');
                    } else {
                        alert('Ошибка при добавлении даты посещения.');
                    }
                });
            }
        }
    });

    calendar.render();
});