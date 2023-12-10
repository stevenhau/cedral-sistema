<?php
include $_SERVER['DOCUMENT_ROOT'] . '/core/DB.php';

class Desarrollo
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBD();
    }

    public function listar()
    {
       echo "llega";
       
    }
}
