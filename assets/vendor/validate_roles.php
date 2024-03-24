<?php
session_start();

// Obtener el rol del usuario actual
$rolUsuario = $_SESSION['rol'];

// Definir los roles permitidos
$rolesPermitidos = ['administrador', 'jefe de carrera', 'docente'];

// Verificar si el rol del usuario está permitido
if (!in_array($rolUsuario, $rolesPermitidos)) {
    // Redirigir al usuario a una página de acceso denegado
    header("Location: acceso_denegado.php");
    exit;
}

// Resto del código...
