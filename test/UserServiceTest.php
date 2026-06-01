<?php

require_once '../app/config/app.php';
require_once '../app/config/database.php';
require_once '../app/vendor/autoload.php';

use app\core\models\dto\UserDto;
use app\core\services\UserService;
use app\core\models\enums\UserProfile;

try{
    $service = new UserService();
    $dto = new UserDto([
        'apellido'  => 'Lorenzetti',
        'nombres'   => 'Marcos',
        'cuenta'    => 'marcos.lorenzetti',
        'perfil'    => UserProfile::ADMINISTRADOR->value,
        'clave'     => 'miclave999',
        'correo'    => 'marcos.lorenzetti@prueba.com'
        ]);
    $service->save($dto);
    echo 'Usuario registrado con éxito';
}
catch(\PDOException $ex){
    echo 'Error inesperado en BD: ' . $ex->getMessage();
}
catch(\Exception $ex){
    echo 'Error inesperado: ' . $ex->getMessage();
}