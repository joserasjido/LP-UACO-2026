<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class UserDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "usuarios");
    }

    public function load(int $id): array{
        return [];
    }

    public function save(array $data): void{
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :apellido, :nombres, :cuenta, :perfil, :clave, :correo, 1, NOW(), 0)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update(array $data): void{

    }


    public function delete(int $id): void{

    }

    public function list(array $filters): array{
        return [];
    }

}