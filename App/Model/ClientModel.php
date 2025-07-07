<?php

namespace App\Model;

use App\Model\Model;
use PDO;

class ClientModel extends Model {
    
    public function create(array $data): false | string {
        $values = "VALUES (:nome, :cpf, :cep, :endereco, :numero, :bairro, :cidade, :estado)";
        $query = "INSERT INTO `clientes` (nome, cpf, cep, endereco, numero, bairro, cidade, estado) $values";
        $this->executeQuery($query, $data);
        return $this->getLastId();
    }

    public function getAll(string $type = "list"): array {
        if($type == "list"){
            $query = "SELECT id, nome, cpf, cep FROM `clientes`";
        }
        else {
            $query = "SELECT * FROM `clientes`";
        }
        $result = $this->executeQuery($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): array {
        $query = "SELECT * FROM `clientes` WHERE id = :id";
        $result = $this->executeQuery($query, ['id' => $id]);
        $fetch = $result->fetchAll(PDO::FETCH_ASSOC);
        return count($fetch) > 0 ? $fetch[0] : $fetch;
    }

    public function delete(int $id) : int {
        $query = "DELETE FROM bairro_ceps WHERE cliente_id = :cliente_id";
        $result = $this->executeQuery($query, ["cliente_id" => $id]);
        if($result->rowCount() == 0){
            return $result->rowCount();
        }

        $query = "DELETE FROM clientes WHERE id = :id";
        $result = $this->executeQuery($query, ["id" => $id]);
        return $result->rowCount();
    }

    public function update($data, $id): int {
        $data["id"] = $id;
        $query = "UPDATE `clientes` SET nome = :nome, cpf = :cpf, cep = :cep, endereco = :endereco, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado WHERE id = :id";
        return $this->executeQuery($query, $data)->rowCount();
    }
}