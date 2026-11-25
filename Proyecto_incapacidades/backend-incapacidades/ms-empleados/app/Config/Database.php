
<?php

use Illuminate\Database\Capsule\Manager as Capsule;

// Crear el administrador de conexiones
$capsule = new Capsule;

// Configurar la conexión con MySQL
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'ms_empleados_db',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix'    => '',
]);

// Activar Eloquent
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Devolver la conexión
return $capsule;
