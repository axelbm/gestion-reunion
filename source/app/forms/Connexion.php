<?php

namespace app\forms;

use core\DAO;

class Connexion extends \core\Form {
    public $courriel;
    public $motDePasse;


    public function valider (){
        $resultat = true;

        if (!$this->validerChamp("Courriel", $this->courriel)) {
            $this->ajouterErreur("courriel", "Courriel invlide");
            $resultat = false;
        }

        if ($this->motDePasse == "") {
            $this->ajouterErreur("motDePasse", "Mot de passe obligatoire");
            $resultat = false;
        }

        if ($resultat) {     
            $u = DAO::Utilisateur()->find($this->courriel);

            if ($u == NULL) {  
                $this->ajouterErreur("courriel", "Utilisateur inexistant");
            }
            elseif (!$u->validerMotDePasse($this->motDePasse)) {
                $this->ajouterErreur("motDePasse", "Mot de passe incorrect");
            }
        }
    }
}