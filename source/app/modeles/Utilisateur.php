<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Utilisateur as dao;

class Utilisateur extends Modele {
    /** @var string */
    protected $courriel;
    
    /** @var string */
    protected $nom;
    
    /** @var string */
    protected $prenom;
    
    /** @var string */
    protected $motdepasse;
    
    /** @var int */
    protected $administrateur;

    /**
     * Valide le mot de passe de l'utilisateur
     *
     * @param string $pass
     * @return boolean
     */
    public function validerMotDePasse (string $pass) : bool {
        return $pass == $this->motdepasse;
    }

    /**
     * Retourne le nom complete de l'utilisateur selon le format demandé.
     * (0) Prénom Nom, (1) Nom Prénom, (2) P.A.
     *
     * @param integer $format
     * @return string
     */
    public function getNomComplet (int $format = 0) : string{
        switch($format){
            case 1:
                return "$this->nom $this->prenom";
            case 2:
                return \substr($this->prenom,0,1).".".\substr($this->nom,0,1).".";
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
