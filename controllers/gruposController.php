<?php
require_once '../models/grupos.php';
$option = (empty($_GET['option'])) ? '' : $_GET['option'];
$grupos = new GruposModel();
switch ($option) {
    case 'listar':
        $data = $grupos->getGrupos();
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
        $id_grupo = $_POST['id_grupo'];
        if ($id_grupo == '') {
            $consult = $grupos->comprobarNombre($nombre, 0);
            if (empty($consult)) {
                $result = $grupos->save($nombre);
                if ($result) {
                    $res = array('tipo' => 'success', 'mensaje' => 'GRUPO REGISTRADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL AGREGAR');
                }
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'EL GRUPO YA EXISTE');
            }
        } else {
            $consult = $grupos->comprobarNombre($nombre, $id_grupo);
            if (empty($consult)) {
                $result = $grupos->update($nombre, $id_grupo);
                if ($result) {
                    $res = array('tipo' => 'success', 'mensaje' => 'GRUPO MODIFICADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL MODIFICAR');
                }
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'EL GRUPO YA EXISTE');
            }
        }
        echo json_encode($res);
        break;
    case 'delete':
        $id = $_GET['id'];
        $data = $grupos->delete($id);
        if ($data) {
            $res = array('tipo' => 'success', 'mensaje' => 'GRUPO ELIMINADO');
        } else {
            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res);
        break;
    case 'edit':
        $id = $_GET['id'];
        $data = $grupos->getGrupo($id);
        echo json_encode($data);
        break;
    default:
        # code...
        break;
}
