<?php

namespace app\forms;

use app\modeles;

class AjouterParticipation extends \core\Form {
    protected $reunionid;
    protected $courriels;
    
    public function valider () {
        var_dump($this->courriels);
        if ($this->courriels == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }
        if ($this->reunionid == "") {
            $this->ajouterErreur("reunionid", "Réunion obligatoire");
        }
    }

    public function action() {
        $participation = new modeles\Participation($this->reunionid, $this->courriel, "EnAtente");
        $participation->sauvegarder();

        \core\MainControleur::rediriger("accueil");
    }
}