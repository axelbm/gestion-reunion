<?php

namespace app\dao;

use \core\DAO;

class Participation extends DAO {
    static protected $table = "participations";

    static protected $proprietes = array(
        "ReunionID" => "reunionid:string:PK",
        "Courriel" => "courriel:string:PK",
        "StatusID" => "statusid:string",
    );
}