<?php

require_once '../config.php';
require_once 'conexion.php';

//conecta a la base de datos
$conexion = new Conexion();
$pdo = $conexion->conectar();

//consulta para obtener los roles desde la base de datos
$consulta = $pdo->prepare("SELECT * FROM roles");
$consulta->execute();

//obtener los resultados como un array asociativo
$roles = $consulta->fetchAll(PDO::FETCH_ASSOC);

//devuelve los roles en formato JSON
echo json_encode($roles);
?>