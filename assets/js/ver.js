let calendar;
let calendarEl = document.getElementById('registro');
let carrera = document.getElementById('carrera');
let semestre = document.getElementById('semestre');
document.addEventListener('DOMContentLoaded', function () {
    calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'local',
        initialView: 'dayGridWeek',
        locale: 'es',
        events: ruta + 'controllers/asistenciaController.php?option=asistencia&carrera=' + carrera.value + '&semestre=' + semestre.value

    });
    calendar.render();


})