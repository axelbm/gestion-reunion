<?php

namespace app\dao;

use \core\DAO;

class Dossier extends DAO {
    static protected $table = "dossiers";

    static protected $proprietes = array(
        "ID" => "dossierid:string:PK",
        "Description" => "description:string"
    );
}