<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Reunion as dao;

class Reunion extends Modele {
    protected $reunionid;
    protected $date;

    public function __construct(datetime $date= new DateTime()) {
        $this->date = $date;
    }

    public function inviterUtilisateur(Utilisateur $user){
        throw(new \Exception("Pas implementé"));
    }

    public function ajouterPointDordre(PointDordre $point){
        throw(new \Exception("Pas implementé"));
    }
}