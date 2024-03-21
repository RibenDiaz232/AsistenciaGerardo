let calendar;
let calendarEl = document.getElementById('registro');
let carrera = document.getElementById('carrera');
let semestre = document.getElementById('semestre');
let grupo = document.getElementById('grupo');
document.addEventListener('DOMContentLoaded', function () {
    calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'local',
        initialView: 'dayGridWeek',
        locale: 'es',
        events: ruta + 'controllers/asistenciaController.php?option=asistencia&carrera=' + carrera.value + '&semestre=' + semestre.value + '&grupo=' + grupo.value

    });
    calendar.render();


})