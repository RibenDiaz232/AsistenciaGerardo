<form id="frmEstudiante" autocomplete="off">
    <div class="card mb-2">
        <div class="card-body">
            <input type="hidden" id="id_estudiante" name="id_estudiante">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="matricula">Matrícula <span class="text-danger">*</span></label>
                        <input id="matricula" class="form-control" type="text" name="matricula" placeholder="Matrícula">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="apellido">Apellidos <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="telefono">Telefono <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="direccion">Dirección <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="carrera">Carrera <span class="text-danger">*</span></label>
                        <select id="carrera" class="form-control" name="carrera">
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="semestre">Semestre <span class="text-danger">*</span></label>
                        <select id="semestre" class="form-control" name="semestre">
                        </select>
                    </div>
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
            <table class="table table-striped table-hover" style="width: 100%;" id="table_estudiantes">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Carrera</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Dirección</th>                        
                        <th scope="col">Semestre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>