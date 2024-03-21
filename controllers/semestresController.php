<?php
require_once '../models/semestres.php';
$option = (empty($_GET['option'])) ? '' : $_GET['option'];
$semestres = new SemestresModel();
switch ($option) {
    case 'listar':
        $data = $semestres->getSemestres();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<div class="d-flex">
                <a class="btn btn-danger btn-sm" onclick="eliminar(' . $data[$i]['id'] . ')"><i class="fas fa-eraser"></i></a>
                <a class="btn btn-primary btn-sm" onclick="edit(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></a>
            </div>';
        }
        echo json_encode($data);
        break;
    case 'save':
        $nombre = $_POST['nombre'];
        $id_semestre = $_POST['id_semestre'];
        if ($id_semestre == '') {
            $consult = $semestres->comprobarNombre($nombre, 0);
            if (empty($consult)) {
                $result = $semestres->save($nombre);
                if ($result) {
                    $res = array('tipo' => 'success', 'mensaje' => 'NIVEL REGISTRADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL AGREGAR');
                }
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'EL NIVEL YA EXISTE');
            }
        } else {
            $consult = $semestres->comprobarNombre($nombre, $id_semestre);
            if (empty($consult)) {
                $result = $semestres->update($nombre, $id_semestre);
                if ($result) {
                    $res = array('tipo' => 'success', 'mensaje' => 'NIVEL MODIFICADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL MODIFICAR');
                }
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'EL NIVEL YA EXISTE');
            }
        }
        echo json_encode($res);
        break;
    case 'delete':
        $id = $_GET['id'];
        $data = $semestres->delete($id);
        if ($data) {
            $res = array('tipo' => 'success', 'mensaje' => 'NIVEL ELIMINADO');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res);
        break;
    case 'edit':
        $id = $_GET['id'];
        $data = $semestres->getSemestre($id);
        echo json_encode($data);
        break;
    default:
        # code...
        break;
}
