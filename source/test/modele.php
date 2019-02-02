<?php

$user = \app\modeles\Utilisateur::toObject(array(
    "courriel" => "axel@gmail.com",
    "nom" => "Michaud",
    "prenom" => "Axel",
    "motdepasse" => "test",
    "administrateur" => 0
));

// $user = \app\doa\Utilisateur::find("axel@gmail.com");

if(!is_null($user)) {
    
}

// $user->setCourriel("test");

$user->setNom("CCCCCC");
var_dump($user->getNomComplet());

