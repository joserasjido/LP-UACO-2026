<?php

namespace app\core\services;

use app\core\models\dto\UserDto;
use app\core\models\dao\UserDao;
use app\core\services\base\BaseService;
use app\libs\database\Connection;

final class UserService extends BaseService{
    
    function __construct()
    {
        parent::__construct(new UserDao(Connection::get()));
    }

    public function save(UserDto $dto): void{
        $this->validate($dto);
        $this->dao->save($dto->toArrayForSave());
    } 

    private function validate(UserDto $dto): void{
        if($dto->getApellido() == ""){
            throw new \Exception("El campo <strong>apellido</strong> es obligatorio");
        }
        if($dto->getNombres() == ""){
            throw new \Exception("El campo <strong>nombres</strong> es obligatorio");
        }
        if($dto->getCuenta() == ""){
            throw new \Exception("El campo <strong>cuenta</strong> es obligatorio");
        }
        if($dto->getPerfil() == ""){
            throw new \Exception("Debe especificar el <strong>perfil</strong> de la cuenta.");
        }
        if($dto->getClave() == ""){
            throw new \Exception("No se especificó una <strong>clave</strong> válida");
        }
        if($dto->getCorreo() == ""){
            throw new \Exception("No se especificó una dirección de <strong>correo</strong> válida");
        }
    }

}