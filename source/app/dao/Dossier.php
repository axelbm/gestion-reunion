<?php

namespace app\dao;

use \core\DAO;
use \core\Database;
use \app\modeles;

class Dossier extends DAO {
    protected $table = "dossiers";

    protected $proprietes = array(
        "Id" => "dossierid:int:PK,AI",
        "Nom" => "nom:string",
        "Description" => "description:string",

        "PointDordres" => "Id:PointDordre:FK:dossierid"
    );

    public function getListeParReunion(int $page, modeles\Reunion $reunion, ?int $npp = 10) : array{
        return $this->select("INNER JOIN pointdordres ON dossiers.dossierid = pointdordres.dossierid
                                WHERE pointdordres.reunionid = ".$reunion->getId()." LIMIT ".$page*$npp.", $npp ORDER BY nom");
    }

    public function getListe(int $page, ?int $npp = 10) : array{
        return $this->select("LIMIT ".$page*$npp.", $npp ORDER BY nom");
    }

    public function getListeParNom(int $page, string $nom, ?int $npp = 10) : array{
        return $this->select("WHERE nom = $nom LIMIT ".$page*$npp.", $npp ORDER BY nom");
    }

    public function getPage(?int $npp = 10) : int{
        $statement = Database::query("select count(dossierid) from dossiers");
        $result = $statement->fetch();
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }

    public function getPageParNom(?string $nom = "", ?int $npp = 10) : int{
        $statement = Database::query("select count(dossierid) from dossiers WHERE CONTAINS(nom , '$nom')");
        $result = $statement->fetch();
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }

    public function getPageParReunion(modeles\Reunion $reunion, ?int $npp = 10) : int{
        $statement = Database::query("select count(dossierid) from dossiers 
                                    INNER JOIN pointdordres ON dossiers.dossierid = pointdordres.dossierid
                                    WHERE pointdordres.reunionid = ".$reunion->getId());
        $result = $statement->fetch();
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }
}