const frm = document.querySelector('#frmAsignatura');
const nombre = document.querySelector('#nombre');
const codigo = document.querySelector('#codigo');
const id_asignatura = document.querySelector('#id_asignatura');
const btn_nuevo = document.querySelector('#btn-nuevo');
const btn_save = document.querySelector('#btn-save');
document.addEventListener('DOMContentLoaded', function () {
  $('#table_asignaturas').DataTable({
    ajax: {
      url: ruta + 'controllers/asignaturasController.php?option=listar',
      dataSrc: ''
    },
    columns: [
      { data: 'id' },
      { data: 'nombre' },
      { data: 'codigo' },
      { data: 'accion' }
    ],
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
    },
    "order": [[0, 'asc']]
  });
  frm.onsubmit = function (e) {
    e.preventDefault();
    if (nombre.value == '', codigo.value == '') {
      message('error', 'TODO LOS CAMPOS CON * SON REQUERIDOS')
    } else {
      const frmData = new FormData(frm);
      axios.post(ruta + 'controllers/asignaturasController.php?option=save', frmData)
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
    id_asignatura.value = '';
    btn_save.innerHTML = 'Guardar';
    nombre.focus();
  }
})

function eliminar(id) {
  Snackbar.show({
    text: 'Esta seguro de eliminar',
    width: '475px',
    actionText: 'Si eliminar',
    backgroundColor: '#FF0303',
    onActionClick: function (element) {
      axios.get(ruta + 'controllers/asignaturasController.php?option=delete&id=' + id)
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
  axios.get(ruta + 'controllers/asignaturasController.php?option=edit&id=' + id)
    .then(function (response) {
      const info = response.data;
      nombre.value = info.nombre;
      codigo.value = info.codigo;
      id_asignatura.value = info.id;
      btn_save.innerHTML = 'Actualizar';
      nombre.focus();
    })
    .catch(function (error) {
      console.log(error);
    });
}