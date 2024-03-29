<?php
require_once '../config.php';
require_once 'conexion.php';

class UsuariosModel{
    private $pdo, $con;
    public function __construct() {
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }

    public function getUsers()
    {
        $consult = $this->pdo->prepare("SELECT * FROM usuario WHERE estado = 1");
        $consult->execute();
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUser($id)
    {
        $consult = $this->pdo->prepare("SELECT * FROM usuario WHERE idusuario = ?");
        $consult->execute([$id]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function comprobarCorreo($correo)
    {
        $consult = $this->pdo->prepare("SELECT * FROM usuario WHERE correo = ? AND estado = 1");
        $consult->execute([$correo]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function saveUser($nombre, $correo, $clave, $direccion, $id_cargo)
{
    $consult = $this->pdo->prepare("INSERT INTO usuario (nombre, correo, clave, direccion, id_cargo) VALUES (?,?,?,?,?)");
    return $consult->execute([$nombre, $correo, $clave, $direccion, $id_cargo]);
}

    public function deleteUser($id)
    {
        $consult = $this->pdo->prepare("UPDATE usuario SET estado = ? WHERE idusuario = ?");
        return $consult->execute([0, $id]);
    }

    public function updateUser($nombre, $correo, $direccion, $id, $id_cargo)
{
    $consult = $this->pdo->prepare("UPDATE usuario SET nombre=?, correo=?, direccion=?, id_cargo=? WHERE idusuario=?");
    return $consult->execute([$nombre, $correo, $direccion, $id_cargo, $id]);
}

    public function asignarRol($id, $rol)
    {
        $consult = $this->pdo->prepare("INSERT INTO usuario_rol (idusuario, idrol) VALUES (?,?)");
        return $consult->execute([$id, $rol]);
    }

    public function quitarRol($id_usuario, $id_rol)
    {
        $consult = $this->pdo->prepare("DELETE FROM usuario_rol WHERE idusuario = ? AND idrol = ?");
        return $consult->execute([$id_usuario, $id_rol]);
    }

    public function obtenerRolesUsuario($id_usuario)
    {
        $consult = $this->pdo->prepare("SELECT r.* FROM roles r INNER JOIN usuarios_roles ur ON r.id = ur.id_rol WHERE ur.id_usuario = ?");
        $consult->execute([$id_usuario]);
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>