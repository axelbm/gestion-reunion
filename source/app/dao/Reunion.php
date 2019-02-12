<?php

namespace app\dao;

use \core\DAO;

class Reunion extends DAO {
    protected $table = "reunions";

    protected $proprietes = array(
        "Id" => "reunionid:string:PK,AI",
        "Date" => "date:datetime",

        "PointDordres" => "Id:PointDordre:FK:reunionid",
        "Participations" => "Id:Participation:FK:reunionid"
    );

    /**
     * Undocumented function
     *
     * A faire : un selecteur de date dans l'interface
     * @param \DateTime $date
     * @return array
     */
    public function recherche(\DateTime $date) : array {
        return $this->select("WHERE date = $date");
    }

    /**
     * Undocumented function
     *
     * @param integer $page
     * @param string|null $courriel
     * @param integer|null $npp Nombre par fucking page
     * @return array
     */
    public function getListe(int $page, ?string $courriel, ?int $npp = 10) : array{
        $select = "";

        if ($courriel != null)
            $select = "INNER JOIN participations
                ON reunions.reunionid = participations.reunionid
                WHERE participations.courriel = $courriel";

        $select .= "LIMIT ".$page*$npp.", $npp ORDER BY date";

        return $this->select($select);
    }

    public function getListeParDate(int $page, ?string $courriel, ?int $npp = 10) : array{
        if ($courriel != null)
            $select = "INNER JOIN participations
                ON reunions.reunionid = participations.reunionid
                WHERE participations.courriel = $courriel AND ";
        else 
            $select = "WHERE ";

        $select .= "date > CURDATE() LIMIT ".$page*$npp.", $npp ORDER BY date";

        return $this->select($select);
    }

    public function getListeParDossier(int $page, Dossier $dossier, ?int $npp = 10) : array{
        return $this->select("INNER JOIN pointdordres ON reunions.reunionid = pointdordres.reunionid
                                WHERE pointdordres.dossierid = ".$dossier->getId." LIMIT ".$page*$npp.", $npp ORDER BY date");
    }
}