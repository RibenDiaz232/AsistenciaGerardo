let carrera = document.getElementById('carrera');
let semestre = document.getElementById('semestre');
document.addEventListener('DOMContentLoaded', function () {
  $('#table_asistencia').DataTable({
    ajax: {
      url: ruta + 'controllers/asistenciaController.php?option=listar',
      dataSrc: ''
    },
    columns: [
      { data: 'id' },
      { data: 'fecha' },
      { data: 'matricula' },
      { data: 'nombre' },
      { data: 'carrera' },
      { data: 'semestre' },
      { data: 'ingreso' },
      { data: 'salida' },
      { data: 'accion' }
    ],
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
    },
    "order": [[0, 'desc']]
  });

  cargarCarreras();
  cargarSemestres();

  carrera.addEventListener('change', function (e) {
    if (e.target.value != '' && semestre.value != '') {
      cargarDatos(e.target.value, semestre.value);
    }
    console.log(e.target.value);
  });

  semestre.addEventListener('change', function (e) {
    if (e.target.value != '' && carrera.value != '') {
      cargarDatos(carrera.value, e.target.value);
    }
    console.log(e.target.value);
  });
})

function cargarCarreras() {
  axios.get(ruta + 'controllers/estudiantesController.php?option=datos&item=carreras')
    .then(function (response) {
      const info = response.data;
      let html = '<option value="">Seleccionar</option>';
      info.forEach(carrera => {
        html += `<option value="${carrera.id}">${carrera.nombre}</option>`;
      });
      carrera.innerHTML = html;
    })
    .catch(function (error) {
      console.log(error);
    });
}

function cargarSemestres() {
  axios.get(ruta + 'controllers/estudiantesController.php?option=datos&item=semestres')
    .then(function (response) {
      const info = response.data;
      let html = '<option value="">Seleccionar</option>';
      info.forEach(semestre => {
        html += `<option value="${semestre.id}">${semestre.nombre}</option>`;
      });
      semestre.innerHTML = html;
    })
    .catch(function (error) {
      console.log(error);
    });
}

function cargarDatos(carrera, semestre) {
  window.location = ruta + 'plantilla.php?pagina=ver&carrera=' + carrera + '&semestre=' + semestre;
}