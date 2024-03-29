<?php
require_once '../config.php';
require_once 'conexion.php';
class EstudiantesModel{
    private $pdo, $con;
    public function __construct() {
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }

    public function getEstudiantes()
    {
        $consult = $this->pdo->prepare("SELECT e.*, c.nombre AS carrera, s.nombre AS semestre, g.nombre AS grupo FROM estudiantes e 
        INNER JOIN carreras c ON e.id_carrera = c.id 
        INNER JOIN semestres s ON e.id_semestre = s.id 
        INNER JOIN grupos g ON e.id_grupo = g.id WHERE e.estado = 1");
        $consult->execute();
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDatos($table)
    {
        $consult = $this->pdo->prepare("SELECT * FROM $table WHERE estado = ?");
        $consult->execute([1]);
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEstudiante($id)
    {
        $consult = $this->pdo->prepare("SELECT * FROM estudiantes WHERE id = ?");
        $consult->execute([$id]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function comprobarMatrícula($matricula, $accion)
    {
        if ($accion == 0) {
            $consult = $this->pdo->prepare("SELECT * FROM estudiantes WHERE matricula = ?");
            $consult->execute([$matricula]);
        } else {
            $consult = $this->pdo->prepare("SELECT * FROM estudiantes WHERE matricula = ? AND id != ?");
            $consult->execute([$matricula, $accion]);
        }
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function save($matricula, $nombre, $apellido, $telefono, $direccion, $carrera, $semestre, $grupo)
    {
        $consult = $this->pdo->prepare("INSERT INTO estudiantes (matricula, nombre, apellido, telefono, direccion, id_carrera, id_semestre, id_grupo) VALUES (?,?,?,?,?,?,?,?)");
        return $consult->execute([$matricula, $nombre, $apellido, $telefono, $direccion, $carrera,$semestre, $grupo]);
    }

    public function delete($id)
    {
        $consult = $this->pdo->prepare("UPDATE estudiantes SET estado = ? WHERE id = ?");
        return $consult->execute([0, $id]);
    }

    public function update($matricula, $nombre, $apellido, $telefono, $direccion, $carrera,$semestre, $grupo, $id)
    {
        $consult = $this->pdo->prepare("UPDATE estudiantes SET matricula=?, nombre=?, apellido=?, telefono=?, direccion=?, id_carrera=?, id_semestre=?, id_grupo=? WHERE id=?");
        return $consult->execute([$matricula, $nombre, $apellido, $telefono, $direccion, $carrera,$semestre, $grupo, $id]);
    }
}
