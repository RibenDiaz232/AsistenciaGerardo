<?php
require_once '../models/asignaturas.php';
$option = (empty($_GET['option'])) ? '' : $_GET['option'];
$asignaturas = new AsignaturasModel();
switch ($option) {
    case 'listar':
        $data = $asignaturas->getAsignaturas();
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
        $codigo = $_POST['codigo'];
        $id_asignatura = $_POST['id_asignatura'];
        if ($id_asignatura == '') {
            $consult = $asignaturas->comprobarNombre($nombre, 0);
            if (empty($consult)) {
                $result = $asignaturas->save($nombre,$codigo);
                if ($result) {
                    $res = array('tipo' => 'success', 'mensaje' => 'asignatura REGISTRADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL AGREGAR');
                }
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'EL asignatura YA EXISTE');
            }
        } else {
            $consult = $asignaturas->comprobarNombre($nombre, $id_asignatura);
            if (empty($consult)) {
                $result = $asignaturas->update($nombre, $codigo, $id_asignatura);
                if ($result) {
                    $res = array('tipo' => 'success', 'mensaje' => 'asignatura MODIFICADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL MODIFICAR');
                }
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'EL asignatura YA EXISTE');
            }
        }
        echo json_encode($res);
        break;
    case 'delete':
        $id = $_GET['id'];
        $data = $asignaturas->delete($id);
        if ($data) {
            $res = array('tipo' => 'success', 'mensaje' => 'asignatura ELIMINADO');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res);
        break;
    case 'edit':
        $id = $_GET['id'];
        $data = $asignaturas->getAsignatura($id);
        echo json_encode($data);
        break;
    default:
        # code...
        break;
}
