<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include $_SERVER['DOCUMENT_ROOT'] . '/models/Desarrollo.php';

class DesarrollosController
{

    public function list($parametros)
    {

        $desarrollos = new Desarrollo();
        $arr_desarrollos = $desarrollos->listar();

        //Tratamos los datos para la vista
        $nuevoArray = array_map(function ($item) {

            $nombre_desarrollo = strtoupper($item['nombre']);
            // Crear un objeto DateTime con la fecha original
            $dateTime = new DateTime($item['dataCreation']);
            // Formatear la fecha de acuerdo al nuevo formato
            $fechaCreacion = $dateTime->format('d-m-Y');
            return [
                'id' => $item['id'],                   // Mantener el mismo id
                'nombre' => $nombre_desarrollo,           // Mantener el mismo nombre
                'status' => $item['status'],           // Mantener el mismo status
                'dataCreation' => $fechaCreacion // Mantener la misma dataCreation
            ];
        }, $arr_desarrollos);

        echo json_encode($nuevoArray);
    }

    public function agregar($parametros)
    {
        echo "Agregar Desarrollo Controlador";
    }
}
