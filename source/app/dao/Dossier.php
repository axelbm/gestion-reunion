<?php

namespace app\dao;

use \core\DAO;

class Dossier extends DAO {
    protected $table = "dossiers";

    protected $proprietes = array(
        "Id" => "dossierid:string:PK",
        "Description" => "description:string",

        "PointDordres" => "Id:PointDordre:FK:dossierid"
    );
}