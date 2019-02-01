<?php

namespace app\dao;

class Invitation extends DAO {
    static protected $table = "invitation";

    static protected $proprietes = array(
        "Courriel" => "courriel:string:PK",
        "Cle" => "cle:string"
    );
}