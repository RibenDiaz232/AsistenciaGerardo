<?php
// Incluir el archivo de configuración
require_once 'config.php';

// Establecer la conexión a la base de datos
define('DB_PASS', array('Ribendiaz232', 'Winsome1$', 'martinmp04'));

$conn = new mysqli("localhost", "root", DB_PASSWORD, "asisistencia");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los roles
$sql = "SELECT id, nombre FROM cargo";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Array para almacenar los roles
    $roles = array();
    while($row = $result->fetch_assoc()) {
        // Agregar cada rol al array
        $roles[] = $row;
    }
    // Devolver los roles en formato JSON
    echo json_encode($roles);
} else {
    // No se encontraron roles
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>
