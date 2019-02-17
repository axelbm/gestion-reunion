<?php

namespace app\dao;

use \core\DAO;

class Participation extends DAO {
    protected $table = "participations";

    protected $proprietes = array(
        "ReunionID" => "reunionid:int:PK",
        "Courriel" => "courriel:string:PK",
        "StatutID" => "statutid:string",

        "Utilisateur" => "Courriel:Utilisateur:FK,S:courriel",
        "Reunion" => "ReunionID:Reunion:FK,S:reunionid"
    );
}