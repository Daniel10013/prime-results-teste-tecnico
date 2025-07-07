<?php

namespace App\Lib\Url;

class UrlParser{

    public static function getUrlParameter(int $parameterPosition): string{
        $uri = $_SERVER["REQUEST_URI"];
        $explodedUri = explode("/", $uri);
        $parameterPosition += 1;
        if(isset($explodedUri[$parameterPosition]) == false){
            return "";
        }
        
        return $explodedUri[$parameterPosition];
    }
}