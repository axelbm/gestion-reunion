<?php

namespace app\dao;

use \core\DAO;

abstract class Invitation extends DAO {
    static protected $primaryKeys;
    static protected $parsedProprietes = null;
    
    static protected $table = "invitation";

    static protected $proprietes = array(
        "Courriel" => "courriel:string:PK",
        "Cle" => "cle:string"
    );
}