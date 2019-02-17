<?php

namespace app\forms;

use app\modeles;

class ChangementStatut extends \core\Form {
    protected $statut;
    protected $reunionid;
    
    public function valider () {
        if ($this->reunionid == "") {
            $this->ajouterErreur("reunionid", "Reunion obligatoire");
        }
    }

    public function action() {
        $dossier = new modeles\Dossier($this->nom, $this->description);
        $dossier->sauvegarder();

        \core\MainControleur::rediriger("dossier");
    }
}