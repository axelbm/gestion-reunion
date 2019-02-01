<?php

namespace app\dao;

use \core\DAO;

class Reunion extends DAO {
    static protected $table = "reunions";

    static protected $proprietes = array(
        "ID" => "reunionid:string:PK",
        "Date" => "date:datetime"
    );
}