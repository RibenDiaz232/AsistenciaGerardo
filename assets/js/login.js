const frm = document.querySelector('#frmLogin');
const email = document.querySelector('#email');
const password = document.querySelector('#password');

// Agrega una clase cuando el usuario enfoca un elemento de entrada
email.addEventListener('focus', function() {
    this.parentNode.classList.add('focused');
});

password.addEventListener('focus', function() {
    this.parentNode.classList.add('focused');
});

// Elimina la clase cuando el usuario deja de enfocar un elemento de entrada
email.addEventListener('blur', function() {
    this.parentNode.classList.remove('focused');
});

password.addEventListener('blur', function() {
    this.parentNode.classList.remove('focused');
});

document.addEventListener('DOMContentLoaded', function () {
    var working = false;
    frm.onsubmit = function (e) {
        e.preventDefault();
        if (email.value == '' || password.value == '') {
            message('error', 'TODO LOS CAMPOS CON * SON REQUERIDOS');
        } else {
            if (working) return;
            working = true;
            var $this = $(this),
                $state = $this.find('button > .state');
            $this.addClass('loading');
            $state.html('Autentincando');

            axios.post(ruta + 'controllers/usuariosController.php?option=acceso', {
                email: email.value,
                password: password.value
            })
                .then(function (response) {
                    const info = response.data;
                    if (info.tipo == 'success') {
                        setTimeout(() => {
                            $this.addClass('ok');
                            $state.html('welcome back!'); $this.addClass('ok');
                            $state.html('¡Bienvenido de vuelta!');
                            setTimeout(() => {
                                window.location = ruta + 'plantilla.php';
                            }, 2000);

                        }, 3000);
                    }
                });
        }
    };
});

function message(tipo, mensaje) {
    Snackbar.show({
        text: mensaje,
        pos: 'top-right',
        backgroundColor: tipo == 'success' ? '#079F00' : '#FF0303',
        actionText: 'Cerrar'
    });
}