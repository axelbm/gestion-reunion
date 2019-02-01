<?php

$user = \app\dao\Utilisateur::create(array(
    "courriel" => "axel@gmail.com",
    "nom" => "Michaud",
    "prenom" => "Axel",
    "motdepasse" => "test",
    "administrateur" => true
));

$user->setNom("test");

var_dump($user);
$user->setNom(true);
