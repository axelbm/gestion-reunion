<?php

namespace app\dao;

use \core\DAO;

abstract class Reunion extends DAO {
    static protected $primaryKeys;
    static protected $parsedProprietes = null;
    
    static protected $table = "reunions";

    static protected $proprietes = array(
        "Id" => "reunionid:string:PK",
        "Date" => "date:datetime",

        "PointDordres" => "Id:PointDordre:FK:reunionid",
        "Participations" => "Id:Participation:FK:reunionid"
    );

    static public function recherche(datetime $date) : array{
        return self::select("WHERE date = $date");
    }
}