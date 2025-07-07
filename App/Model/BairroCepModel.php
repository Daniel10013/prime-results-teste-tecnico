<?php

namespace App\Model;

use App\Model\Model;
use PDO;

class BairroCepModel extends Model {
    public function create(string $bairro, string $cep, string $idClient): false | string {
        $query = "INSERT INTO `bairro_ceps` (bairro, cep, cliente_id) VALUES (:bairro, :cep, :cliente_id)";
        $result = $this->executeQuery($query, ["bairro" => $bairro, "cep" => $cep, "cliente_id" => $idClient]);
        return $this->getLastId();
    }

    public function update(string $bairro, string $cep, string $idClient): int {
        $query = "UPDATE `bairro_ceps` SET bairro = :bairro, cep = :cep WHERE cliente_id = :cliente_id";
        $result = $this->executeQuery($query, ["bairro" => $bairro, "cep" => $cep, "cliente_id" => $idClient]);
        return $result->rowCount();
    }

    public function getCepsPorBairro(): array {
        $query = "SELECT bairro, COUNT(cep) as quantidade FROM `bairro_ceps` GROUP BY bairro";
        return $this->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}