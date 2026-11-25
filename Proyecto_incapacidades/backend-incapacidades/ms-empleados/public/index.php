<?php

// Cargar el autoload de Composer
require __DIR__ . '/../vendor/autoload.php';

// Cargar la conexión con la base de datos
require __DIR__ . '/../app/Config/Database.php';

// Importar la fábrica de Slim
use Slim\Factory\AppFactory;

// Crear la aplicación Slim
$app = AppFactory::create();
// Configurar la ruta base del microservicio
$app->setBasePath('/Parcial_Final/Proyecto_incapacidades/backend-incapacidades/ms-empleados/public');

// Configurar la lectura de datos JSON
$app->addBodyParsingMiddleware();

// Configurar las rutas
$app->addRoutingMiddleware();

// Configurar el manejo de errores
$app->addErrorMiddleware(true, true, true);

// Cargar las rutas de empleados
require __DIR__ . '/../app/Routes/empleados.php';

// Iniciar el microservicio
$app->run();
