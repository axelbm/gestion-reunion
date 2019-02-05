<?php

namespace app\dao;

use \core\DAO;

abstract class Dossier extends DAO {
    static protected $primaryKeys;
    static protected $parsedProprietes = null;
    
    static protected $table = "dossiers";

    static protected $proprietes = array(
        "Id" => "dossierid:string:PK",
        "Description" => "description:string",

        "PointDordres" => "Id:PointDordre:FK:dossierid"
    );
}