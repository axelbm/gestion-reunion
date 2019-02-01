<?php

namespace app\dao;

class Reunion extends DAO {
    static protected $table = "reunions";

    static protected $proprietes = array(
        "ReunionID" => "reunionid:string:PK",
        "Date" => "date:datetime"
    );
}