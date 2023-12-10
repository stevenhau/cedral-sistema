<?php
class ConexionBD
{
    private $servername = "localhost:8080"; // Puedes cambiar localhost por la dirección del servidor si es diferente
    private $username = "steven";
    private $password = "Ledrazor8##";
    private $dbname = "cedral_db";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // Establecer el modo de error de PDO a excepción
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa";
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    public function obtenerConexion()
    {
        return $this->conn;
    }

    public function cerrarConexion()
    {
        $this->conn = null;
    }
}
