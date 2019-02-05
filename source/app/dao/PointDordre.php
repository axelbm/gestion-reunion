<?php

namespace app\dao;

use \core\DAO;

abstract class PointDordre extends DAO {
    static protected $primaryKeys;
    static protected $parsedProprietes = null;
    
    static protected $table = "pointdordres";

    static protected $proprietes = array(
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