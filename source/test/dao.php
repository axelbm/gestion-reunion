<?php

use \app\modeles;
use \app\dao;

$user = dao\Utilisateur::find("axel@gmail.com");


if ($user) {
    echo "trouver";
}


// \app\dao\Utilisateur::select("ORDER BY nom");


// $user = new modeles\Utilisateur("francois@gmail.com", "Jesaispas", "François", "mdp", false);
// $user->sauvegarder();

// $user->setNom("B Michaud");

// $user->setNom("Michaud");

// $user->sauvegarder();

// var_dump($user->getPrimaryKeys());


// $user = \app\dao\Utilisateur::find("francois@gmail.com");


// $user->supprimer();


// dao\Utilisateur::supprimer("axel@gmail.com");

var_dump($user);
