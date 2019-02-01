<?php

require "config_systeme.php";
require "config_site.php";

require COREROOT."AutoLoader.php";
spl_autoload_register("core\AutoLoader::loader");

try {
    core\Database::connect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
} catch (\Throwable $th) {
    core\MainControleur::executerErreur(new \Exception("Base de données inaccessible...", 500));
}



$params = explode('/', $_GET['params']);
$action = array_shift($params);

if ($action == "") {
    $action = ACCUEIL;
}
elseif ($action == "_test") {
    $action = array_shift($params);

    require "test/$action.php";

    exit();
}


$ctrl = core\MainControleur::executer($action, $params);