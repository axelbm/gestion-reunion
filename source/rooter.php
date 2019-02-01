<?php

require "config_systeme.php";
require "config_site.php";

require COREROOT."AutoLoader.php";
spl_autoload_register("core\AutoLoader::loader");


core\Database::connect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);


$params = explode('/', $_GET['params']);
$action = array_shift($params);

if ($action == "") {
    $action = "accueil";
}
elseif ($action == "_test") {
    $action = array_shift($params);

    require "test/$action.php";

    return;
}


$ctrl = core\MainControleur::executer($action, $params);
// $ctrl->action($params); 

// echo $_SERVER['REQUEST_URI'];