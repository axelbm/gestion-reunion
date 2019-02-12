<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Invitation as dao;

class Invitation extends Modele {
    protected $courriel;
    protected $cle;

    public function validerCle (string $cleV) : bool {
        return $cleV == $this->cle;
    }

    public function __construct(string $courriel="", string $cle="") {
        $this->courriel = $courriel;
        $this->cle = $cle;
    }
}