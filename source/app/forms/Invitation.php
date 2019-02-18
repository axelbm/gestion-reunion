<?php

namespace app\forms;

use app\modeles;

class Invitation extends \core\Form {
    public $courriel;
    
    public function valider () {
        if ($this->courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }
        elseif(\core\DAO::Invitation()->find($this->courriel)){
            $this->ajouterErreur("courriel", "Ce courriel a déjà reçu une invitation");
        }
    }

    public function action() {
        $cle = \core\Util::randomKey();
        $invitation = new modeles\Invitation($this->courriel, $cle);
        $invitation->sauvegarder();

        //\core\MainControleur::rediriger("invitation");
    }
}