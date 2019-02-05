<?php

namespace app\dao;

use \core\DAO;

abstract class Participation extends DAO {
    static protected $primaryKeys;
    static protected $parsedProprietes = null;
    
    static protected $table = "participations";

    static protected $proprietes = array(
        "ReunionID" => "reunionid:string:PK",
        "Courriel" => "courriel:string:PK",
        "StatusID" => "statusid:string",

        "Utilisateur" => "Courriel:Utilisateur:FK,S:courriel",
        "Reunion" => "ReunionID:Reunion:FK,S:reunionid"
    );
}