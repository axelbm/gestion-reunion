<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Dossier as dao;

class Dossier extends Modele {
    protected $dossierid;
    protected $nom;
    protected $description;

    public function __construct(string $nom="", string $description="") {
        $this->nom = $nom;
        $this->description = $description;
    }
}