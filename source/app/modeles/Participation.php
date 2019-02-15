<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Participation as dao;

class Participation extends Modele {
    /** @var int */
    protected $reunionid;
    
    /** @var string */
    protected $courriel;
    
    /** @var string */
    protected $statusid;

    public function accepter (){
        throw(new \Exception("Pas implementé"));
    }

    public function refuser (){
        throw(new \Exception("Pas implementé"));
    }

    public function __construct(string $courriel="", string $statusid="") {
        $this->courriel = $courriel;
        $this->statusid = $statusid;
    }
}
