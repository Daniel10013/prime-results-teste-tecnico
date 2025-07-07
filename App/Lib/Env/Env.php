<?php

namespace App\Lib\Env;

class Env
{
    public static function get(string $dataKey): string {
        if(file_exists('.env') == false){
            return '';
        }
        $envData = parse_ini_file('.env');
        if(key_exists($dataKey, $envData)){
            return $envData[$dataKey];
        }
        return '';
    }
}