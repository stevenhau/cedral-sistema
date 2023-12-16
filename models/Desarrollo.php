<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include $_SERVER['DOCUMENT_ROOT'] . '/core/DB.php';

class Desarrollo
{
    private $conexion;
    public $nombre;

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

    public function agregarDesarrollo()
    {
        try {
            // Preparar la consulta SQL para la inserción
            $query = "INSERT INTO desarrollos (nombre) VALUES (:nombre)";
            $statement = $this->conexion->prepare($query);

            // Vincular los parámetros usando bindValue
            $statement->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);

            // Ejecutar la consulta
            $resultado = $statement->execute();

            // Comprobar si la inserción fue exitosa
            if ($resultado) {
                echo "Desarrollo agregado correctamente.";
            } else {
                echo "Error al agregar el desarrollo.";
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
}
