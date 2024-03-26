<?php
require_once '../config.php';
require_once 'conexion.php';
class AsignaturasModel{
    private $pdo, $con;
    public function __construct() {
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }

    public function getAsignaturas()
    {
        $consult = $this->pdo->prepare("SELECT * FROM asignaturas WHERE estado = 1");
        $consult->execute();
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAsignatura($id)
    {
        $consult = $this->pdo->prepare("SELECT * FROM asignaturas WHERE id = ?");
        $consult->execute([$id]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function comprobarNombre($nombre, $accion)
    {
        if ($accion == 0) {
            $consult = $this->pdo->prepare("SELECT * FROM asignaturas WHERE nombre = ?");
            $consult->execute([$nombre]);
        } else {
            $consult = $this->pdo->prepare("SELECT * FROM asignaturas WHERE nombre = ? AND id != ?");
            $consult->execute([$nombre, $accion]);
        }
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function comprobarCódigo($codigo, $accion)
    {
        if ($accion == 0) {
            $consult = $this->pdo->prepare("SELECT * FROM asignaturas WHERE codigo = ?");
            $consult->execute([$codigo]);
        } else {
            $consult = $this->pdo->prepare("SELECT * FROM asignaturas WHERE codigo = ? AND id != ?");
            $consult->execute([$codigo, $accion]);
        }
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function save($nombre,$codigo)
    {
        $consult = $this->pdo->prepare("INSERT INTO asignaturas (nombre, codigo) VALUES (?,?)");
        return $consult->execute([$nombre, $codigo]);
    }

    public function delete($id)
    {
        $consult = $this->pdo->prepare("UPDATE asignaturas SET estado = ? WHERE id = ?");
        return $consult->execute([0, $id]);
    }

    public function update($nombre, $codigo, $id)
    {
        $consult = $this->pdo->prepare("UPDATE asignaturas SET nombre=?, codigo=? WHERE id=?");
        return $consult->execute([$nombre, $codigo, $id]);
    }
}
