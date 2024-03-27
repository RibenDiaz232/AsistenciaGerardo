<?php
require_once 'conexion.php';

// Verificar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificar si los datos esperados están presentes en la solicitud
    if(isset($_POST['matricula']) && isset($_POST['accion'])) {

        // Obtener la matrícula del estudiante y la acción (entrada o salida) de la solicitud POST
        $matricula = $_POST['matricula'];
        $accion = $_POST['accion'];

        // Obtener la fecha y hora actual en el formato correcto
        $fecha_actual = date('Y-m-d');
        $hora_actual = date('H:i:s');
        $ingreso_actual = date('Y-m-d H:i:s');

        // Verificar si la acción es de entrada o salida
        if ($accion == 'entrada') {
            // Registrar la entrada del estudiante con la fecha y hora actual
            $mysqli->query("INSERT INTO asistencias (ingreso, fecha, id_estudiante) VALUES ('$ingreso_actual', '$fecha_actual', (SELECT id FROM estudiantes WHERE matricula = '$matricula'))");
            echo json_encode(array('tipo' => 'success', 'mensaje' => 'Registro de entrada realizado exitosamente'));
        } elseif ($accion == 'salida') {
            // Obtener la salida actual en el formato correcto
            $salida_actual = date('Y-m-d H:i:s');
            // Actualizar la salida del estudiante con la fecha y hora actual
            $mysqli->query("UPDATE asistencias SET salida = '$salida_actual' WHERE id_estudiante IN (SELECT id FROM estudiantes WHERE matricula = '$matricula') AND fecha = '$fecha_actual'");
            echo json_encode(array('tipo' => 'success', 'mensaje' => 'Registro de salida realizado exitosamente'));
        } else {
            // Acción no válida
            echo json_encode(array('tipo' => 'error', 'mensaje' => 'Acción no válida'));
        }
    } else {
        // Datos faltantes en la solicitud POST
        echo json_encode(array('tipo' => 'error', 'mensaje' => 'Datos faltantes en la solicitud'));
    }
} else {
    // Tipo de solicitud no válida
    echo json_encode(array('tipo' => 'error', 'mensaje' => 'Tipo de solicitud no válido'));
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>
