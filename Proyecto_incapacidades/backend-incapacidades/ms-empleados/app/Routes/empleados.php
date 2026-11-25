<?php

use App\Controllers\EmpleadoController;

// Crear el controlador
$controller = new EmpleadoController();

// LISTAR TODOS LOS EMPLEADOS
$app->get('/empleados', [$controller, 'index']);

// CONSULTAR UN EMPLEADO POR SU ID
$app->get('/empleados/{id}', [$controller, 'show']);

// REGISTRAR UN EMPLEADO
$app->post('/empleados', [$controller, 'store']);

// ACTUALIZAR UN EMPLEADO
$app->put('/empleados/{id}', [$controller, 'update']);

// ELIMINAR UN EMPLEADO
$app->delete('/empleados/{id}', [$controller, 'delete']);
