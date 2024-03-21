<?php
require_once '../config.php';
require_once 'conexion.php';
class AsistenciaModel{
    private $pdo, $con;
    public function __construct() {
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }

    public function getAsistencias()
    {
        $consult = $this->pdo->prepare("SELECT a.*, e.matricula, CONCAT(e.nombre, ' ', e.apellido) AS estudiante, c.nombre AS carrera, n.nombre AS semestre,  g.nombre AS grupo FROM asistencias a INNER JOIN estudiantes e ON a.id_estudiante = e.id INNER JOIN carreras c ON e.id_carrera = c.id INNER JOIN semestres n ON e.id_semestre = n.id INNER JOIN grupos g ON e.id_grupo = g.id");
        $consult->execute();
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFiltro($carrera, $semestre, $grupo)
    {
        $consult = $this->pdo->prepare("SELECT a.*, CONCAT(e.nombre, ' ', e.apellido) AS estudiante FROM asistencias a INNER JOIN estudiantes e ON a.id_estudiante = e.id INNER JOIN carreras c ON e.id_carrera = c.id INNER JOIN semestres n ON e.id_semestre = n.id INNER JOIN grupos g ON e.id_grupo = g.id WHERE c.id = ?, n.id = ?, g.id = ?");
        $consult->execute([$carrera, $semestre, $grupo]);
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFiltroAsistencia($id_estudiante)
    {
        $consult = $this->pdo->prepare("SELECT a.*, CONCAT(e.nombre, ' ', e.apellido) AS estudiante FROM asistencias a INNER JOIN estudiantes e ON a.id_estudiante = e.id WHERE a.id_estudiante = ?");
        $consult->execute([$id_estudiante]);
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }

    //

    public function getEstudiante($matricula)
    {
        $consult = $this->pdo->prepare("SELECT * FROM estudiantes WHERE matricula = ? AND estado = ?");
        $consult->execute([$matricula, 1]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function getAsistencia($fecha, $id_estudiante)
    {
        $consult = $this->pdo->prepare("SELECT * FROM asistencias WHERE fecha = ? AND id_estudiante = ?");
        $consult->execute([$fecha, $id_estudiante]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function registrarEntrada($entrada, $fecha, $id_estudiante)
    {
        $consult = $this->pdo->prepare("INSERT INTO asistencias (ingreso, fecha, id_estudiante) VALUES (?,?,?)");
        return $consult->execute([$entrada, $fecha, $id_estudiante]);
    }

    public function registrarSalida($salida, $id)
    {
        $consult = $this->pdo->prepare("UPDATE asistencias SET salida=? WHERE id = ?");
        return $consult->execute([$salida, $id]);
    }

    public function buscarEstudiante($valor)
    {
        $consult = $this->pdo->prepare("SELECT * FROM estudiantes WHERE matricula LIKE '%". $valor . "%' AND estado = 1 LIMIT 10");
        $consult->execute();
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }
}
