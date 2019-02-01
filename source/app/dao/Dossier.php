<?php

namespace app\dao;

class Dossier extends DAO {
    static protected $table = "dossiers";

    static protected $proprietes = array(
        "DossierID" => "dossierid:string:PK",
        "Description" => "description:string"
    );
}