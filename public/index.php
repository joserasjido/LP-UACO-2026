<?php

use app\libs\http\Request;
use app\libs\http\Response;

require_once '../app/config/app.php';
require_once '../app/config/database.php';
require_once '../app/vendor/autoload.php';

$request = new Request();

// logica del negocio

$response = new Response();
$response->setMessage("Item registrado con exito");
$response->send();
