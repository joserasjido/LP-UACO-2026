<?php

namespace app\core\models\dao;

use app\core\models\dao\base\InterfaceDao;

final class UserDao implements InterfaceDao{

    public function load(int $id): array{
        return [];
    }

    public function save(array $data): void{

    }

    public function update(array $data): void{

    }


    public function delete(int $id): void{

    }

    public function list(array $filters): array{
        return [];
    }

}