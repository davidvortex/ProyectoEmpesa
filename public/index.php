<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

//Determinar si la aplicación está en modo de mantenimiento...
if (file_exists($mantenimiento = __DIR__.'/../storage/framework/mantenimiento.php')) {
    require $mantenimiento;
}

// Registre el cargador automático de Composer.
require __DIR__.'/../vendor/autoload.php';

//  Arranca Laravel y maneja la solicitud
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
