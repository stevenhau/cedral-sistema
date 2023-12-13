<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include $_SERVER['DOCUMENT_ROOT'] . '/core/DB.php';

class Desarrollo
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new DB();
    }

    public function listar()
    {
        try {
            // Recuperamos todos los desarrollos
            $query = "SELECT * FROM desarrollos";
            $resultado = $this->conexion->query($query);

            // Comprobar si se obtuvieron resultados
            if ($resultado->rowCount() > 0) {
                // Obtener los resultados como un array asociativo
                $desarrollos = $resultado->fetchAll(PDO::FETCH_ASSOC);

                return $desarrollos;
            } else {
                echo "No se encontraron desarrollos.";
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
}
