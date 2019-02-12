<?php

namespace app\dao;

use \core\DAO;
use \core\Database;

class PointDordre extends DAO {
    protected $table = "pointdordres";

    protected $proprietes = array(
        "Id" => "pointdordreid:string:PK,AI",
        "ReunionID" => "reunionid:string",
        "Titre" => "titre:string",
        "Description" => "description:string",
        "DossierID" => "dossierid:string",
        "CompteRendu" => "compterendu:string",

        "Reunion" => "ReunionID:Reunion:FK,S:reunionid",
        "Dossier" => "DossierID:Dossier:FK,S:dossierid"
    );

    public function getListeParTitre(int $page, string $titre, ?int $npp = 10) : array{
        return $this->select("WHERE titre = $titre LIMIT ".$page*$npp.", $npp ORDER BY titre");
    }

    public function getPage(?int $npp = 10) : int{
        $statement = Database::query("select count(pointdordreid) from pointdordres");
        $result = $statement->fetch;
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }
}