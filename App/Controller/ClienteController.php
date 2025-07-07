<?php

namespace App\Controller;

use App\Model\ClientModel;
use App\Controller\BairroCepController;

class ClienteController
{

    public function createClient(array $clientData): array
    {
        if ($this->dataIsEmpty($clientData) == true) {
            return ["message" => "Preencha todos os campos corretamente!", "status" => false];
        }

        if ($this->cpfIsValid($clientData["cpf"]) == false) {
            return ["message" => "CPF inválido!", "status" => false];
        }

        $model = new ClientModel();
        $createdClient = $model->create($clientData);
        if($createdClient == false){
            return ["message" => "Erro ao criar o cliente!", "status" => false];
        }

        $bairroObj = new BairroCepController();
        $cretedBairro = $bairroObj->create($clientData["bairro"], $clientData["cep"], $createdClient);
        if($cretedBairro == false){
            return ["message" => "Erro salvar dados do bairro! Cliente Registrado.", "status" => false];
        }

        return ["message" => "Cliente Registrado com Sucesso!", "status" => true];
    }

    private function dataIsEmpty(array $data): bool
    {
        $fieldsToValidate = ["nome", "cpf", "cep", "numero", "endereco", "cidade", "estado"];
        foreach ($fieldsToValidate as $field) {
            $fieldIsValid = array_key_exists($field, $data) && empty($data[$field]) == false;
            if ($fieldIsValid == false) {
                return true;
            }
        }
        return false;
    }

    private function cpfIsValid(string $cpf): bool
    {
        if (strlen($cpf) != 11 || intval($cpf) == false){
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += $cpf[$i] * (10 - $i);
        }
        $rest = $sum % 11;
        $digit1 = ($rest < 2) ? 0 : 11 - $rest;
        if ($cpf[9] != $digit1) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += $cpf[$i] * (11 - $i);
        }
        $rest = $sum % 11;
        $digit2 = ($rest < 2) ? 0 : 11 - $rest;
        if ($cpf[10] != $digit2) {
            return false;
        }

        return true;
    }

    public function getClientes(string $type = "list"): array{
        $model = new ClientModel();
        return $model->getAll($type);
    }

    public function getById(int $id): array {
        $model = new ClientModel();
        return $model->getById($id);
    }

    public function delete(int $id): array {
        $model = new ClientModel();
        $result = $model->delete($id);
        if($result == 0){
            return ["status" => false, "message" => "Erro ao apagar cliente!"];
        }
        return ["status" => true, "message" => "Cliente deletado com sucesso!"];
    }

    public function updateClient(array $data, int $id): array {
        if ($this->dataIsEmpty($data) == true) {
            return ["message" => "Preencha todos os campos corretamente!", "status" => false];
        }

        if ($this->cpfIsValid($data["cpf"]) == false) {
            return ["message" => "CPF inválido!", "status" => false];
        }

        $bairroObj = new BairroCepController();
        $updatedBairro = $bairroObj->update($data["bairro"], $data["cep"], $id);
        if($updatedBairro == 0){
            return ["message" => "Erro ao atualizar dados do bairro!", "status" => false];
        }

        $model = new ClientModel();
        $updatedClient = $model->update($data, $id);
        if($updatedClient == false){
            return ["message" => "Erro ao atualizar o cliente!", "status" => false];
        }

        return ["message" => "Cliente atualizado com Sucesso!", "status" => true];
    }
}
