<?php

require_once __DIR__.'/router.php';

get('/info', 'info.php');

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/', 'views/home/index.php');

//Rutas para los desarrollos
get('/listar-desarrollos', 'views/desarrollos/index.php');
get('/agregar-desarrollos', 'views/desarrollos/form_agregar.php');
post('/manager', 'controllers/AjaxManagerController.php');

//Rutas para plan de pagos
get('/plan-pagos', 'views/plan_pagos/index.php');

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');