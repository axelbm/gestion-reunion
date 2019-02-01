<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Participation as dao;

class Participation extends Modele {
    protected $reunionid;
    protected $courriel;
    protected $statusid;

    public function accepter (){

    }

    public function refuser (){
        
    }
}
