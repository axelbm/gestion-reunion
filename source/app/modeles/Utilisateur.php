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
                return "$nom $prenom";
                break;
            case 1:
                return "$prenom $nom";
                break;
            case 2:
                return \substr($nom,0,1)." ".\substr($prenom,0,1);
                break;
        }
    }
}
