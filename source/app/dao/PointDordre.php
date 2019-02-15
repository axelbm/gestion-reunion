<?php

namespace app\dao;

use \core\DAO;
use \core\Database;

class PointDordre extends DAO {
    protected $table = "pointdordres";

    protected $proprietes = array(
        "Id" => "pointdordreid:int:PK,AI",
        "ReunionID" => "reunionid:int",
        "Titre" => "titre:string",
        "Description" => "description:string",
        "DossierID" => "dossierid:int",
        "CompteRendu" => "compterendu:string",

        "Reunion" => "ReunionID:Reunion:FK,S:reunionid",
        "Dossier" => "DossierID:Dossier:FK,S:dossierid"
    );

    public function getListeParTitre(int $page, ?string $titre = "", ?int $npp = 10) : array{
        return $this->select("WHERE CONTAINS(titre , '$titre') LIMIT ".$page*$npp.", $npp ORDER BY titre");
    }

    public function getPage(?string $titre = "", ?int $npp = 10) : int{
        $statement = Database::query("select count(pointdordreid) from pointdordres WHERE CONTAINS(titre , '$titre')");
        $result = $statement->fetch();
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }
}