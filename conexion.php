<?php
$mysqli = new mysqli("localhost", "root", "Winsome1$", "Asistencia");

// Verificar si la conexión tuvo éxito
if ($mysqli->connect_error) {
    die('Error de la conexión: ' . $mysqli->connect_error);
} else {
    echo 'Conectado';
}
?>
