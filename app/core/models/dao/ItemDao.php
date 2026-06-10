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

    public function suggestive(array $filters): array{
        // $sql = "SELECT SQL_CALC_FOUND_ROWS mat.id, mat.nombre, mat.codigo, mat.estado, mat.tipo";
        // $sql .= " FROM materiales as mat";

        // $parameters = [];
        // $clauses = [];

        // //Se preparan los parámetros con los token de la consulta preparada, y las condiciones para el WHERE
        // if(isset($filters["tipo"]) && $filters["tipo"] != ""){
        //     $clauses["tipo"] = "(tipo = :tipo)";
        //     $parameters["tipo"] = $filters["tipo"];
        // }
        // if(isset($filters["valueToSearch"])){
        //     $clauses["valueToSearch"] = "(mat.nombre LIKE :value OR mat.codigo LIKE :value)";
        //     $parameters["value"] = "%" . $filters["valueToSearch"] . "%"; 
        // }

        // //Se arma la clásula WHERE
        // if(count($clauses) > 0){
        //     $sql .= " WHERE " . implode(" AND ", $clauses);
        // }
        // //Se arma la clásula ORDER BY
        // $sql .= (isset($filters["order"]) && strlen($filters["order"]) > 0) ? " ORDER BY {$filters["order"]}" : " ORDER BY mat.nombre ASC";
        // //Se arma la clásula LIMIT para el paginador
        // if(isset($filters["startIndex"]) && isset($filters["offSet"]) && ((int)$filters["offSet"]) > 0){
        //     $sql .= " LIMIT {$filters["startIndex"]}, {$filters["offSet"]}";
        // }

        // return $this->selectQuery($sql, $parameters);
        return [];
    }

}