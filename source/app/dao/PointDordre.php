<?php

namespace app\dao;

use \core\DAO;

class PointDordre extends DAO {
    static protected $table = "pointdordres";

    static protected $proprietes = array(
        "ID" => "pointdordreid:string:PK",
        "ReunionID" => "reunionid:string",
        "Titre" => "titre:string",
        "Description" => "description:string",
        "DossierID" => "dossierid:string",
        "CompteRendu" => "compterendu:string"
    );
}