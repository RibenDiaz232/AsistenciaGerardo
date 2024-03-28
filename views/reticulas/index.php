<form id="frmReticula" autocomplete="off">
    <div class="card mb-2">
        <div class="card-body">
            <input type="hidden" id="id_reticula" name="id_reticula">
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="carrera">Carrera<span class="text-danger">*</span></label>
                        <select id="carrera" class="form-control" name="carrera">
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="semestre">Semestre<span class="text-danger">*</span></label>
                        <select id="semestre" class="form-control" name="semestre">
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="asignatura">Asignatura<span class="text-danger">*</span></label>
                        <select id="asignatura" class="form-control" name="asignatura">
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
            <table class="table table-striped table-hover" style="width: 100%;" id="table_reticulas">
                <thead>
                    <tr>
                        <th scope="col">Carrera</th>
                        <th scope="col">Semestre</th>
                        <th scope="col">Asignatura</th> 
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