<?php
$controller_name = substr(ucwords($_POST['controller']), 1) ?? "";
$controller_name = explode('-', $controller_name);
$controller_name = $controller_name[0];
$action = $_POST['action'] ?? "";
$parameters = $_POST['parameters'] ?? "";

// Validar que tanto el controlador como la acción no estén vacíos
if (empty($controller_name) || empty($action)) {
    $error = [
        "error" => true,
        "mensaje" => "El controlador y la acción son obligatorios"
    ];
    echo json_encode($error);
    exit();
}

// Separar la acción y el módulo
$class_name = ucwords($controller_name) . 'Controller';

include $_SERVER['DOCUMENT_ROOT'] . '/controllers/' . $class_name . '.php';

$dynamic_instance = new $class_name();
$dynamic_instance->$action($parameters);
