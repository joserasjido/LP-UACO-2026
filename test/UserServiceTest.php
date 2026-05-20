<?php

require_once '../app/config/database.php';
require_once '../app/libs/database/Connection.php';
require_once '../app/core/models/dao/base/InterfaceDao.php';
require_once '../app/libs/password/Password.php';
require_once '../app/core/models/dto/UserDto.php';
require_once '../app/core/models/dao/base/BaseDao.php';
require_once '../app/core/models/dao/UserDao.php';
require_once '../app/core/models/enums/UserProfile.php';
require_once '../app/core/services/base/BaseService.php';
require_once '../app/core/services/UserService.php';

use app\core\models\dto\UserDto;
use app\core\services\UserService;
use app\core\models\enums\UserProfile;

try{
    $service = new UserService();
    $dto = new UserDto([
        'apellido'  => 'Molina',
        'nombres'   => 'Sonia',
        'cuenta'    => 'sonia.molina',
        'perfil'    => UserProfile::ADMINISTRADOR->value,
        'clave'     => 'miclave999',
        'correo'    => 'sonia@gmail.com'
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