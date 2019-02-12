<?php

namespace app\dao;

use \core\DAO;

class Dossier extends DAO {
    protected $table = "dossiers";

    protected $proprietes = array(
        "Id" => "dossierid:string:PK",
        "Nom" => "nom:string",
        "Description" => "description:string",

        "PointDordres" => "Id:PointDordre:FK:dossierid"
    );

    public function getListeParReunion(int $page, Reunion $reunion, ?int $npp = 10) : array{
        return $this->select("INNER JOIN pointdordres ON dossier.reunionid = pointdordres.reunionid
                                WHERE pointdordres.reunionid = ".$reunion->getId." LIMIT ".$page*$npp.", $npp ORDER BY nom");
    }

    public function getListe(int $page, Dossier $dossier, ?int $npp = 10) : array{
        return $this->select("LIMIT ".$page*$npp.", $npp ORDER BY nom");
    }

    public function getListeParNom(int $page, string $nom, ?int $npp = 10) : array{
        return $this->select("WHERE nom = $nom LIMIT ".$page*$npp.", $npp ORDER BY nom");
    }
}