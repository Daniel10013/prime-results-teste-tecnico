<?php 

namespace App\Controller;

use App\Lib\Url\UrlParser;

class Ajax{

    // garante quais funcoes podem ser executadas a partir dessa classe
    private array $methods = [
        "deleteClient"
    ];

    // valida se a a funcao chamada eh valida, e executa
    public function __construct(string $url){
        $method = UrlParser::getUrlParameter(1);
        if(in_array($method, $this->methods) == false){
            die("Requested method doesn't exists");
        }

        if(empty($_POST)){
            $this->$method();
            die;
        }
        
        $this->$method($_POST);
        die;
    }

    private function deleteClient(){
        $clientId = UrlParser::getUrlParameter(2);
        if(intval($clientId) == false){
            echo json_encode(["status" => false, "message" => "ID inválido!"]);
        }
        echo json_encode((new ClienteController)->delete((int)$clientId));
    }
}