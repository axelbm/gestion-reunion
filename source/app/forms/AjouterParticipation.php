<?php

namespace app\forms;

use app\modeles;

class AjouterParticipation extends \core\Form {
    protected $reunionid;
    protected $courriel;
    
    public function valider () {
        if ($this->courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }
        if ($this->reunionid == "") {
            $this->ajouterErreur("reunionid", "Réunion obligatoire");
        }
    }

    public function action() {
        $participation = new modeles\Participation($this->reunionid, $this->courriel, "EnAtente");
        $participation->sauvegarder();

        \core\MainControleur::chargerPage("accueil");
    }
}