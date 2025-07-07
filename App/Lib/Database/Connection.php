<?php

namespace App\Lib\Database;

use PDO;
use PDOException;

class Connection
{
    private string $db_name = DB_NAME;
    private string $db_user = DB_USER;
    private string $db_host = DB_HOST;
    private string $db_password = DB_PASS;
    private PDO $connection;
    function __construct()
    {
        try {
            $connectionString = "mysql:host=$this->db_host;dbname=$this->db_name;port=3306;charset=utf8";
            $this->connection = new PDO(
                $connectionString,
                $this->db_user,
                $this->db_password
            );
        } catch (PDOException $e) {
            echo "Erro de Conexão" . $e->getMessage();
        }
    }
    function getConnection(): PDO
    {
        return $this->connection;
    }
}