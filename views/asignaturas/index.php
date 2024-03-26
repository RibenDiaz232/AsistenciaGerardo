<form id="frmAsignatura" autocomplete="off">
    <div class="card mb-2">
        <div class="card-body">
            <input type="hidden" id="id_asignatura" name="id_asignatura">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="nombre">Nombre de la asignatura <span class="text-danger">*</span></label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="codigo">Código de la asignatura <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código">
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="carrera">Carrera</label>
                    <select id="carrera" class="form-control">
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="semestre">Semestre</label>
                    <select id="semestre" class="form-control">
                    </select>
                </div>
            </div>
        </div>
        <div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" style="width: 100%;" id="table_asignaturas">
                <thead>
                    <tr>
                        <th scope="col">Carrera</th>
                        <th scope="col">Semestre</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Código</th>                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>