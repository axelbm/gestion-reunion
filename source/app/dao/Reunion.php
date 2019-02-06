<?php

namespace app\dao;

use \core\DAO;

class Reunion extends DAO {
    protected $table = "reunions";

    protected $proprietes = array(
        "Id" => "reunionid:string:PK",
        "Date" => "date:datetime",

        "PointDordres" => "Id:PointDordre:FK:reunionid",
        "Participations" => "Id:Participation:FK:reunionid"
    );

    public function recherche(datetime $date) : array{
        return $this->select("WHERE date = $date");
    }
}