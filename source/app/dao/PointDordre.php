<?php

namespace app\dao;

class PointDordre extends DAO {
    static protected $table = "pointdordres";

    static protected $proprietes = array(
        "PointDordreID" => "pointdordreid:string:PK",
        "ReunionID" => "reunionid:string",
        "Titre" => "titre:string",
        "Description" => "description:string",
        "DossierID" => "dossierid:string",
        "CompteRendu" =­> "compterendu:string"
    );
}