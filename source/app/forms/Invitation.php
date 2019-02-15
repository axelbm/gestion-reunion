<?php

namespace app\forms;

use app\modeles;

class Invitation extends \core\Form {
    protected $courriel;
    
    public function valider () {
        if ($this->courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }
        elseif(\app\dao\Invitation::find($this->courriel)){
            $this->ajouterErreur("courriel", "Ce courriel a déjà reçu une invitation");
        }
    }

    public function action() {
        $cle = "PlaceHolder";
        $invitation = new modeles\Invitation($this->courriel, $cle);
        $invitation->sauvegarder();

        \core\MainControleur::rediriger("accueil");
    }
}