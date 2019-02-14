<?php

namespace app\forms;

use app\modeles;

class AjouterReunion extends \core\Form {
    protected $date;
    
    public function valider () {
        if ($this->date == "") {
            $this->ajouterErreur("date", "Date obligatoire");
        }
    }

    public function action() {
        $reunion = new modeles\Reunion($this->date);
        $reunion->sauvegarder();

        \core\MainControleur::rediriger("accueil");
    }
}