<?php
require "AutoLoader.php";
spl_autoload_register("AutoLoader::loader");


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


$ctrl = new app\Controleur($action, $params);

\app\dao\Utilisateur::create(array());
