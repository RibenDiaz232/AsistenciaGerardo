<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <form id="frmUser" autocomplete="off">
        <div class="card mb-2">
            <div class="card-body">
                <input type="hidden" id="id_user" name="id_user">
                <div class="row">
                    <div class="col-md-4">
                        <label for="nombre">Nombre <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="correo">Correo <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="direccion">Dirección <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="clave">Contraseña <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="roles">Roles</label>
                        <select id="roles" name="id_cargo" class="form-select">
                            <option value="0">Seleccione un rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Jefe de carrera</option>
                            <option value="3">Docente</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="button" class="btn btn-danger" id="btn-nuevo">Nuevo</button>
                <button type="submit" class="btn btn-primary" id="btn-save">Guardar</button>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" style="width: 100%;" id="table_users">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Roles</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div id="modalPermiso" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar permisos</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- html permisos -->
                    <form id="frmPermiso">
    
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Datos de ejemplo para los roles (pueden ser obtenidos de una API o una base de datos)
        var roles = [
            { id: 1, nombre: "Administrador" },
            { id: 2, nombre: "Jefe de carrera" },
            { id: 3, nombre: "Docente" }
        ];

        // Función para cargar los roles en el menú desplegable
        function cargarRoles() {
            var selectRoles = $('#roles');
            selectRoles.empty(); // Limpiar opciones actuales

            // Agregar opción por defecto
            selectRoles.append($('<option>', {
                value: 0,
                text: 'Seleccione un rol'
            }));

            // Agregar cada rol como una opción
            roles.forEach(function(rol) {
                selectRoles.append($('<option>', {
                    value: rol.id,
                    text: rol.nombre
                }));
            });
        }

        // Llamar a la función para cargar los roles cuando el DOM esté listo
        $(document).ready(function() {
            cargarRoles();
        });
    </script>
</body>
</html>
