<?php

namespace app\dao;

use \core\DAO;

class PointDordre extends DAO {
    protected $table = "pointdordres";

    protected $proprietes = array(
        "Id" => "pointdordreid:string:PK",
        "ReunionID" => "reunionid:string",
        "Titre" => "titre:string",
        "Description" => "description:string",
        "DossierID" => "dossierid:string",
        "CompteRendu" => "compterendu:string",

        "Reunion" => "ReunionID:Reunion:FK,S:reunionid",
        "Dossier" => "DossierID:Dossier:FK,S:dossierid"
    );
}