<?php

namespace app\core\models\dao;

use app\core\models\dao\base\BaseDao;
use app\core\models\dao\base\InterfaceDao;

final class ItemDao extends BaseDao implements InterfaceDao{

    public function __construct(\PDO $conn)
    {
        parent::__construct($conn, "productos");
    }

    public function load(int $id): array{
        return [];
    }

    public function save(array $data): void{
        $this->validateCodigo(0, $data['codigo']);
        $sql = "INSERT INTO {$this->table} VALUES(DEFAULT, :nombre, :codigo, :descripcion, :categoriaId, :precio, :stock)";
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

    private function validateCodigo(int $id, string $codigo): void{
        $sql = "SELECT id FROM {$this->table} WHERE codigo = :codigo && id != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id'     => $id,
            'codigo' => $codigo
        ]);
        if($stmt->rowCount() != 0){
            throw new \Exception("El codigo {$codigo} ya esta siendo usado por otro producto.");
        }
    }

}