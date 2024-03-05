<?php
class Conexion{
    public function conectar()
    {
        $pdo = null;
        foreach (DB_PASS as $password) {
            try {
                $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.'', DB_USER, $password);
                return $pdo;
            } catch (PDOException $e) {
                // En caso de error, continuar con la siguiente contraseña
            }
        }
        // Si ninguna contraseña funciona, lanzar un error
        die("¡Error!: No se pudo conectar a la base de datos.");
    }
}
?>