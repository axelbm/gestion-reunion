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

    public function __construct(string $courriel="", string $nom="", string $prenom="", string $motdepasse="", int $administrateur=0) {
        $this->courriel = $courriel;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->motdepasse = $motdepasse;
        $this->administrateur = $administrateur;
    }

    public function validerMotDePasse (string $pass) : bool {
        return $pass == $this->motdepasse;
    }

    public function getNomComplet (int $format = 0) : string{
        switch($format){
            case 1:
                return "$this->nom $this->prenom";
            case 2:
                return \substr($this->prenom,0,1)." ".\substr($this->nom,0,1);
            default:
                return "$this->prenom $this->nom";
        }
    }

    public function onSetNom($old, $new) {
        \var_dump($old);
        \var_dump($new);

        return $new;
    }

    public function estAdministrateur() : bool {
        return $this->administrateur >= 1;
    }

    public function estSuperAdministrateur() : bool {
        return $this->administrateur == 2;
    }
}
