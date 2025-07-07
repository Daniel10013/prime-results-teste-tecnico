<?php

header("Content-type:text/html; charset=utf8");
error_reporting(E_ALL);

use App\Lib\Env\Env;

//dados do conexao do banco
define("DB_PASS", Env::get("DB_PASS"));
define("DB_NAME", Env::get("DB_NAME"));
define("DB_USER", Env::get("DB_USER"));
define("DB_HOST", Env::get("DB_HOST"));

//outras configs para o funcionamento do site
define("BASE_DIR", __DIR__);
define("BASE_URL", "http://localhost/prime-results/");
define("ASSETS_DIR", BASE_URL . "App/view/assets/");
