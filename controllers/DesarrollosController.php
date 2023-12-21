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

        if ($arr_desarrollos !== "error") {
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
        }else{
            $resultado = [
                "error" => true
            ];

            echo json_encode($resultado);
        }
    }

    public function agregar($parametros)
    {
        //Instanciamos 
        $desarrollos = new Desarrollo();
        //Tratamos los datos recibidos por la vista
        foreach ($parametros as $data) {
            $name = $data['name'] ?? "";
            $desarrollos->$name = $data['value'];
        }

        $resultado_agregado = $desarrollos->agregarDesarrollo();

        // Comprobar si la inserción fue exitosa
        $resultado = [];
        if ($resultado_agregado) {
            $resultado = [
                "title" => "Guardado",
                "mensaje" => "Desarrollo guardado correctamente.",
                "icon" => "success"
            ];
            echo json_encode($resultado);
        } else {
            $resultado = [
                "title" => "Error.",
                "mensaje" => "No se guardo el desarrollo.",
                "icon" => "error"
            ];
            echo json_encode($resultado);
        }
    }

    public function eliminar($parametros)
    {
        //Instanciamos 
        $desarrollos = new Desarrollo();
        $desarrollos->id = intval($parametros);

        $resultado_eliminado = $desarrollos->eliminarDesarrollo();

        // Comprobar si la eliminacion fue exitosa
        $resultado = [];
        if ($resultado_eliminado) {
            $resultado = [
                "title" => "Eliminado",
                "mensaje" => "El Desarrollo se elimino correctamente.",
                "icon" => "success"
            ];
            echo json_encode($resultado);
        } else {
            $resultado = [
                "title" => "Error.",
                "mensaje" => "No se pudo eliminar el desarrollo.",
                "icon" => "error"
            ];
            echo json_encode($resultado);
        }
    }
}
