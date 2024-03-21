const frm = document.querySelector('#frmEstudiante');
const matricula = document.querySelector('#matricula');
const telefono = document.querySelector('#telefono');
const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const direccion = document.querySelector('#direccion');
const carrera = document.querySelector('#carrera');
const semestre = document.querySelector('#semestre');
const grupo = document.querySelector('#grupo');
const id_estudiante = document.querySelector('#id_estudiante');
const btn_nuevo = document.querySelector('#btn-nuevo');
const btn_save = document.querySelector('#btn-save');
document.addEventListener('DOMContentLoaded', function () {
  
  cargarCarreras();
  cargarSemestres();
  cargarGrupos();

  $('#table_estudiantes').DataTable({
    ajax: {
      url: ruta + 'controllers/estudiantesController.php?option=listar',
      dataSrc: ''
    },
    columns: [
      { data: 'id' },
      { data: 'matricula' },
      { data: 'nombres' },
      { data: 'telefono' },
      { data: 'direccion' },      
      { data: 'semestres' },
      { data: 'carreras' },
      { data: 'grupos' },
      { data: 'accion' }
    ],
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
    },
    "order": [[0, 'desc']]
  });
  frm.onsubmit = function (e) {
    e.preventDefault();
    if (matricula.value == '' || telefono.value == '' || nombre.value == ''
    || apellido.value == '' || direccion.value == '' || carrera.value == '' || semestre.value == ''|| grupo.value == '') {
      message('error', 'TODO LOS CAMPOS CON * SON REQUERIDOS')
    } else {
      const frmData = new FormData(frm);
      axios.post(ruta + 'controllers/estudiantesController.php?option=save', frmData)
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
    id_estudiante.value = '';
    btn_save.innerHTML = 'Guardar';
    matricula.focus();
  }
})

function deleteEst(id) {
  Snackbar.show({
    text: 'Esta seguro de eliminar',
    width: '475px',
    actionText: 'Si eliminar',
    backgroundColor: '#FF0303',
    onActionClick: function (element) {
      axios.get(ruta + 'controllers/estudiantesController.php?option=delete&id=' + id)
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

function editEst(id) {
  axios.get(ruta + 'controllers/estudiantesController.php?option=edit&id=' + id)
    .then(function (response) {
      const info = response.data;
      matricula.value = info.matricula;
      telefono.value = info.telefono;
      nombre.value = info.nombre;
      apellido.value = info.apellido;
      direccion.value = info.direccion;
      carrera.value = info.id_carrera;
      semestre.value = info.id_semestre;
      grupo.value = info.id_grupo;
      id_estudiante.value = info.id;
      btn_save.innerHTML = 'Actualizar';
      matricula.focus();
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

function cargarGrupos() {
  axios.get(ruta + 'controllers/estudiantesController.php?option=datos&item=grupos')
    .then(function (response) {
      const info = response.data;
      let html = '<option value="">Seleccionar</option>';
      info.forEach(grupo => {
        html += `<option value="${grupo.id}">${grupo.nombre}</option>`;
      });
      grupo.innerHTML = html;
    })
    .catch(function (error) {
      console.log(error);
    });
}