
<?php

// Cargar las dependencias instaladas por Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Importar Slim
use Slim\Factory\AppFactory;

// Crear la aplicación
$app = AppFactory::create();

// Configurar la ruta base de la API
$app->setBasePath('');

// Permitir recibir JSON en las solicitudes
$app->addBodyParsingMiddleware();

// Ruta inicial para comprobar que la API funciona
$app->get('/', function ($request, $response) {

    $datos = [
        "mensaje" => "Microservicio de autenticación funcionando",
        "servicio" => "ms-auth",
        "estado" => "activo"
    ];

    $response->getBody()->write(
        json_encode($datos, JSON_UNESCAPED_UNICODE)
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
});

// Ejecutar la aplicación
$app->run();

