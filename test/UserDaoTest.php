<?php

require_once '../app/config/database.php';
require_once '../app/libs/database/Connection.php';
require_once '../app/core/models/dao/base/InterfaceDao.php';
require_once '../app/core/models/dao/base/BaseDao.php';
require_once '../app/core/models/dao/UserDao.php';
require_once '../app/core/models/enums/UserProfile.php';

try{
    $dao = new app\core\models\dao\UserDao(app\libs\database\Connection::get());
    $dao->save([
        'apellido'  => 'Perea',
        'nombres'   => 'Leando Daniel',
        'cuenta'    => 'leando.perea',
        'perfil'    => app\core\models\enums\UserProfile::ADMINISTRADOR->value,
        'clave'     => 'miclave123',
        'correo'    => 'perea@prueba.com'
        ]);
    echo 'Usuario registrado con éxito';
}
catch(\PDOException $ex){
    echo 'Error inesperado en BD: ' . $ex->getMessage();
}
catch(\Exception $ex){
    echo 'Error inesperado: ' . $ex->getMessage();
}