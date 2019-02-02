<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Participation as dao;

class Participation extends Modele {
    protected $reunionid;
    protected $courriel;
    protected $statusid;

    public function accepter (){
        throw(new \Exception("Pas implementé"));
    }

    public function refuser (){
        throw(new \Exception("Pas implementé"));
    }
}
