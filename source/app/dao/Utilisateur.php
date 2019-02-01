<?php

namespace app\dao;

use \core\DAO;

class Utilisateur extends DAO {
    static protected $table = "utilisateurs";

    static protected $proprietes = array(
        "Courriel" => "courriel:string:PK",
        "Nom" => "nom:string",
        "Prenom" => "prenom:string",
        "MotDePasse" => "motdepasse:string",
        "Administrateur" => "administrateur:boolean"
    );


    static public function obtenirAdministrateur() : array {
        throw(new \Exception("Pas implementé"));
        // return self::executPase()->selectAll()->where("administrateur=1")->toList();
    }
}
