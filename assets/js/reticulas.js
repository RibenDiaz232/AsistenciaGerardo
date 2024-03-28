const frm = document.querySelector('#frmReticula');
const carrera = document.querySelector('#carrera');
const semestre = document.querySelector('#semestre');
const asignatura = document.querySelector('#asignatura');
const codigo = document.querySelector('#codigo');
const id_reticula = document.querySelector('#id_reticula');
const btn_nuevo = document.querySelector('#btn-nuevo');
const btn_save = document.querySelector('#btn-save');
document.addEventListener('DOMContentLoaded', function () {

  cargarCarreras();
  cargarSemestres();
  cargarAsignaturas();

  $('#table_reticulas').DataTable({
    ajax: {
      url: ruta + 'controllers/reticulasController.php?option=listar',
      dataSrc: ''
    },
    columns: [
      { data: 'carrera' },
      { data: 'semestre' },
      { data: 'asignatura' },
      { data: 'codigo' },
      { data: 'accion' }
    ],
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
    },
    "order": [[0, 'desc']]
  });
  frm.onsubmit = function (e) {
    e.preventDefault();
    if (carrera.value == '' || semestre.value == '' || asignatura.value == '') {
      message('error', 'TODO LOS CAMPOS CON * SON REQUERIDOS')
    } else {
      const frmData = new FormData(frm);
      axios.post(ruta + 'controllers/reticulasController.php?option=save', frmData)
        .then(function (response) {
          const info = response.data;
          message(info.tipo, info.mensaje);
          if (info.tipo == 'success') {
            setTimeout(() => {
              window.location.reload();
            }, 1500);
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  }
  btn_nuevo.onclick = function () {
    frm.reset();
    id_reticula.value = '';
    btn_save.innerHTML = 'Guardar';
    id_reticula.focus();
  }
})

function eliminar(id) {
  Snackbar.show({
    text: 'Esta seguro de eliminar',
    width: '475px',
    actionText: 'Si eliminar',
    backgroundColor: '#FF0303',
    onActionClick: function (element) {
      axios.get(ruta + 'controllers/reticulasController.php?option=delete&id=' + id)
        .then(function (response) {
          const info = response.data;
          message(info.tipo, info.mensaje);
          if (info.tipo == 'success') {
            setTimeout(() => {
              window.location.reload();
            }, 1500);
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  });

}

function edit(id) {
  axios.get(ruta + 'controllers/reticulasController.php?option=edit&id=' + id)
    .then(function (response) {
      const info = response.data;
      carrera.value = info.id_carrera;
      semestre.value = info.id_semestre;
      asignatura.value = info.id_asignatura;
      id_reticula.value = info.id;
      btn_save.innerHTML = 'Actualizar';
      id_reticula.focus();
    })
    .catch(function (error) {
      console.log(error);
    });
}

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

function cargarAsignaturas() {
  axios.get(ruta + 'controllers/asignaturasController.php?option=datos&item=asignaturas')
    .then(function (response) {
      const info = response.data;
      let html = '<option value="">Seleccionar</option>';
      info.forEach(asignatura => {
        html += `<option value="${asignatura.id}">${asignatura.nombre}</option>`;
      });
      asignatura.innerHTML = html;
    })
    .catch(function (error) {
      console.log(error);
    });
}