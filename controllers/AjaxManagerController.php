<?php
$contolador = substr(ucwords($_POST['controlador']), 1) ?? "";

//Separamos la funcion y el modulo
$action_and_modulo = explode("-", $contolador);
$ation = $action_and_modulo[0];
$clase = $action_and_modulo[1];
$parametros = $_POST['parametros'] ?? "";
//Cachamos y enviamos el error
if (empty($contolador)) {
    $error = [
        "error" => true,
        "mensaje" => "El controlador no puede estar vacios"
    ];

    echo json_encode($error);
    exit();
}
//Construimos el controlador para incluirlo
$nombre_clase = $clase . 'Controller';

include $_SERVER['DOCUMENT_ROOT'] . '/controllers/' . $nombre_clase . '.php';

$instanciaDinamica = new $nombre_clase();
$instanciaDinamica->$ation($parametros);