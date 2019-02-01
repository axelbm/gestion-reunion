<?php

// $user = \app\dao\Utilisateur::create(array(
//     "courriel" => "axel@gmail.com",
//     "nom" => "Michaud",
//     "prenom" => "Axel",
//     "motdepasse" => "test",
//     "administrateur" => true
// ));

$user = \app\doa\Utilisateur::find("axel@gmail.com");

if(!is_null($user)) {
    
}

$user->setNom("test");

var_dump($user);

$user->setNom(true);
