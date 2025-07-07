<?php

namespace App\Controller;

use App\Model\BairroCepModel;

class BairroCepController {

    private BairroCepModel $model;

    public function __construct() {
        $this->model = new BairroCepModel();
    }

    public function create(string $bairro, string $cep, int $clientId): int {
        return $this->model->create($bairro, $cep, $clientId);
    }

    public function update(string $bairro, string $cep, int $clientId): int
    {
        return $this->model->create($bairro, $cep, $clientId);
    }

    public function getCepsPorBairro(): array {
        return $this->model->getCepsPorBairro();
    }
}