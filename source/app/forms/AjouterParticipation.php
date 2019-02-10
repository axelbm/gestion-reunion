<?php

namespace app\forms;

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
        $participation = new \modeles\Participation($reunionid, $courriel, "EnAtente");
        $participation->sauvegarder();

        \core\MainControleur::chargerPage("accueil");
    }
}