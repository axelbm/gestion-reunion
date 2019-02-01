<?php

namespace app\dao;

class Participation extends DAO {
    static protected $table = "participations";

    static protected $proprietes = array(
        "ReunionID" => "reunionid:string:PK",
        "Courriel" => "courriel:string",
        "StatusID" => "statusid:string",
    );
}