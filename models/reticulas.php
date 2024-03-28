<?php
require_once '../config.php';
require_once 'conexion.php';
class ReticulasModel{
    private $pdo, $con;
    public function __construct() {
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }

    public function getReticulas()
    {
        $consult = $this->pdo->prepare("SELECT r.*, c.nombre AS carrera, s.nombre AS semestre, a.nombre AS asignatura, a.codigo AS codigo FROM reticulas r 
        INNER JOIN carreras c ON r.id_carrera = c.id 
        INNER JOIN semestres s ON r.id_semestre = s.id 
		INNER JOIN asignaturas a ON r.id_asignatura = a.id WHERE r.estado = 1");
        $consult->execute();
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getDatos($table)
    {
        $consult = $this->pdo->prepare("SELECT * FROM $table WHERE estado = ?");
        $consult->execute([1]);
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReticula($id)
    {
        $consult = $this->pdo->prepare("SELECT * FROM reticulas WHERE id = ?");
        $consult->execute([$id]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function comprobarNombre($id, $accion)
    {
        if ($accion == 0) {
            $consult = $this->pdo->prepare("SELECT * FROM reticulas WHERE id = ?");
            $consult->execute([$id]);
        } else {
            $consult = $this->pdo->prepare("SELECT * FROM reticulas WHERE id = ? AND id != ?");
            $consult->execute([$id, $accion]);
        }
        return $consult->fetch(PDO::FETCH_ASSOC);
    }


    public function save($carrera, $semestre, $asignatura)
    {
        $consult = $this->pdo->prepare("INSERT INTO reticulas (id_carrera, id_semestre, id_asignatura) VALUES (?,?,?)");
        return $consult->execute([$carrera, $semestre, $asignatura]);
    }

    public function delete($id)
    {
        $consult = $this->pdo->prepare("UPDATE reticulas SET estado = ? WHERE id = ?");
        return $consult->execute([0, $id]);
    }

    public function update($carrera, $semestre, $asignatura, $id)
    {
        $consult = $this->pdo->prepare("UPDATE reticulas SET  id_carrera=?, id_semestre=?, id_asignatura=? WHERE id=?");
        return $consult->execute([$carrera, $semestre, $asignatura, $id]);
    }
}
