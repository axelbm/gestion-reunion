<?php

namespace app\forms;

use core\DAO;

class Connexion extends \core\Form {
    protected $proprietes = [
        "courriel" => "Courriel",
        "motDePasse" => "MotDePasse"
    ];

    public function valider (){
        $resultat = true;

        if ($this->courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
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