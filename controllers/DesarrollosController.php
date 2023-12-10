<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/models/Desarrollo.php';

    class DesarrollosController
    {

        public function listar($parametros)
        {

            $desarrollos = new Desarrollo();
            $desarrollos->listar();

            

        }

        public function agregar($parametros)
        {
            echo "Agregar Desarrollo Controlador";
        }

    }


?>