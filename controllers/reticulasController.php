<?php
require_once '../models/reticulas.php';
$option = (empty($_GET['option'])) ? '' : $_GET['option'];
$reticulas = new ReticulasModel();
switch ($option) {
    case 'listar':
        $data = $reticulas->getReticulas();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['carreras'] = '<span class="badge mx-1">'.$data[$i]['carrera'].'</span>';
            $data[$i]['semestres'] = '<span class="badge mx-1">'.$data[$i]['semestre'].'</span>';
            $data[$i]['asignaturas'] = '<span class="badge mx-1">'.$data[$i]['asignatura'].'</span>';
            $data[$i]['accion'] = '<div class="d-flex">
                <a class="btn btn-danger btn-sm" onclick="eliminar(' . $data[$i]['id'] . ')"><i class="fas fa-eraser"></i></a>
                <a class="btn btn-primary btn-sm" onclick="edit(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></a>
            </div>';
        }
        echo json_encode($data);
        break;
    case 'save':
        $carrera = $_POST['carrera'];
        $semestre = $_POST['semestre'];
        $asignatura = $_POST['asignatura'];
        $id_reticula = $_POST['id_reticula'];
        if ($id_reticula == '') {
            $consult = $reticulas->comprobarNombre($id_reticula, 0);
            if (empty($consult)) {
                $result = $reticulas->save($carrera, $semestre, $asignatura, $codigo);
                if ($result) {
                    $res = array('tipo' => 'success', 'mensaje' => 'reticula REGISTRADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL AGREGAR');
                }
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'EL reticula YA EXISTE');
            }
        } else {
            $consult = $reticulas->comprobarNombre($asignatura, $id_reticula);
            if (empty($consult)) {
                $result = $reticulas->update($carrera, $semestre, $asignatura, $codigo, $id_reticula);
                if ($result) {
                    $res = array('tipo' => 'success', 'mensaje' => 'reticula MODIFICADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL MODIFICAR');
                }
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'EL reticula YA EXISTE');
            }
        }
        echo json_encode($res);
        break;
    case 'delete':
        $id = $_GET['id'];
        $data = $reticulas->delete($id);
        if ($data) {
            $res = array('tipo' => 'success', 'mensaje' => 'reticula ELIMINADO');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res);
        break;
    case 'edit':
        $id = $_GET['id'];
        $data = $reticulas->getReticula($id);
        echo json_encode($data);
        break;
    case 'datos':
        $item = $_GET['item'];
        $data = $reticulas->getDatos($item);
        echo json_encode($data);
        break;
    default:
        # code...
        break;
}
