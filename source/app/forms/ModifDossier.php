<?php

namespace app\forms;

use app\modeles;

class AjouterDossier extends \core\Form {
    protected $description;
    protected $dossierid;
    
    public function valider () {
        
    }

    public function action() {
        $dossier = \core\DAO::Dossier()->find($this->dossierid);
        $dossier->setDescription($this->description);
        $dossier->sauvegarder();
        
        \core\MainControleur::rediriger("dossier");
    }
}