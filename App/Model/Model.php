<?php

namespace App\Model;

use PDO;
use Exception;
use PDOStatement;
use App\Lib\Database\Connection;

class Model
{
    protected PDO $connection;

    function __construct()
    {
        $this->connection = (new Connection())->getConnection();
    }

    protected function executeQuery(string $query, array $userData = []): PDOStatement
    {
        $stmt = $this->connection->prepare($query);
        foreach($userData as $key => $data){
            $stmt->bindValue(":$key", $data);
        }
        $hasExecuted = $stmt->execute();
        if($hasExecuted == false){
            throw new Exception("Erro no servidor.");
        }
        return $stmt;
    }

    protected function getLastId(): string | false {
        return $this->connection->lastInsertId();
    }

    public function debug(string $query, array $params): string {
        foreach ($params as $key => $value) {
            $escapedValue = is_numeric($value) ? $value : "'" . addslashes($value) . "'";
            // Garante que :user e :user_id não conflitem
            $query = preg_replace('/:' . preg_quote($key, '/') . '\b/', $escapedValue, $query);
        }
        return $query;
    }
}