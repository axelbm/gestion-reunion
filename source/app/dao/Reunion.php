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

    public function getListe(?string $courriel, int $page, ?int $npp = 10) : array{
        if ($courriel != null){
            $select = "INNER JOIN participations
                ON reunions.reunionid = participations.reunionid
                WHERE participations.courriel = $courriel;";
        }
        $select += "LIMIT $page, $npp ORDER BY date";

        return $this->select($select);
    }

    public function getListeParDate(?string $courriel, int $page, ?int $npp = 10) : array{
        if ($courriel != null){
            $select = "INNER JOIN participations
                ON reunions.reunionid = participations.reunionid
                WHERE participations.courriel = $courriel;";
        }
        $select += "WHERE date > curdate() LIMIT $page, $npp ORDER BY date";

        return $this->select($select);
    }
}