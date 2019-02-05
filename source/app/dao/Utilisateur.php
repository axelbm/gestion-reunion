<?php

namespace app\dao;

use \core\DAO;

abstract class Utilisateur extends DAO {
    static protected $primaryKeys;
    static protected $parsedProprietes = null;
    
    static protected $table = "utilisateurs";

    static protected $proprietes = array(
        "Courriel" => "courriel:string:PK",
        "Nom" => "nom:string",
        "Prenom" => "prenom:string",
        "MotDePasse" => "motdepasse:string",
        "Administrateur" => "administrateur:boolean",
        
        "Participations" => "Courriel:Participation:FK:courriel"
    );


    static public function obtenirAdministrateurs() : array {
        return self::select("WHERE administateur = 1");
    }
}
