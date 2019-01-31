<?php

// "Courriel" => "courriel:string:PK",
// "Nom" => "nom:string",
// "Prenom" => "prenom:string",
// "MotDePasse" => "motdepasse:string",
// "Administrateur" => "administrateur:bool"
$user = \app\dao\Utilisateur::create(array(
    "courriel" => "axel@gmail.com",
    "nom" => "Michaud",
    "prenom" => "Axel",
    "motdepasse" => "test",
    "administrateur" => true
));

var_dump($user);
