<?php

namespace app\forms;

use app\dao;

class Connexion extends \core\Form {
    protected $courriel;
    protected $motDePasse;


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
            $u = dao\Utilisateur::find($this->courriel);

            if ($u == NULL) {  
                $this->ajouterErreur("courriel", "Utilisateur inexistant");
            }
            elseif (!$u->validerMotDePasse($this->motDePasse)) {
                $this->ajouterErreur("motDePasse", "Mot de passe incorrect");
            }
        }
    }
}