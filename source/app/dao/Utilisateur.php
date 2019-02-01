<?php

namespace app\dao;

class Utilisateur extends DAO {
    static protected $table = "utilisateurs";

    static protected $proprietes = array(
        "Courriel" => "courriel:string:PK",
        "Nom" => "nom:string",
        "Prenom" => "prenom:string",
        "MotDePasse" => "motdepasse:string",
        "Administrateur" => "administrateur:boolean"
    );
}
