<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Utilisateur as dao;

class Utilisateur extends Modele {
    protected $courriel;
    protected $nom;
    protected $prenom;
    protected $motdepasse;
    protected $administrateur;

    public function validerMotDePasse (string $pass) : bool {
        if ($pass == $motdepasse){
            return true;
        }
        return false;
    }

    public function getNomComplet (int $format = 0) : string{
        switch($format){
            case 0:
                return "$this->prenom $this->nom";
                break;
            case 1:
                return "$this->nom $this->prenom";
                break;
            case 2:
                return \substr($this->prenom,0,1)." ".\substr($this->nom,0,1);
                break;
        }
    }
}
