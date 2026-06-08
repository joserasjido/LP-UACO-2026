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
        $this->validateCuenta(0, $data['cuenta']);
        $this->validateCorreo(0, $data['correo']);
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :apellido, :nombres, :cuenta, :perfil, :clave, :correo, 1, NOW(), 0)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function login(string $cuenta): array{
        $sql = "SELECT user.id, user.apellido, user.nombres, user.cuenta, user.clave, user.perfil, user.estado, user.resetPass";
        $sql .= " FROM usuarios AS user";
        $sql .= " WHERE (cuenta = :cuenta OR correo = :cuenta)";
        $result = $this->selectQuery($sql, ["cuenta" => $cuenta]);
        if(count($result) != 1){
            throw new \Exception("El nombre de usuario o la contraseña no coinciden");
        }
        return $result[0];
    }

    public function updatePassword(array $data): void{
        $sql = "UPDATE {$this->table}";
        $sql .= " SET clave =:clave";
        $sql .= " WHERE id = :id";
        $this->updateQuery($sql, $data);
    }

    public function update(array $data): void{

    }


    public function delete(int $id): void{

    }

    public function list(array $filters): array{
        return [];
    }

    private function validateCuenta(int $id, string $cuenta): void{
        $sql = "SELECT id FROM {$this->table} WHERE cuenta = :cuenta && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'cuenta' => $cuenta
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("La cuenta {$cuenta} ya esta siendo usada por otro usuario.");
        }
    }

    private function validateCorreo(int $id, string $correo): void{
        $sql = "SELECT id FROM {$this->table} WHERE correo = :correo && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'correo' => $correo
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("El correo {$correo} ya esta siendo usado por otro usuario.");
        }
    }

}