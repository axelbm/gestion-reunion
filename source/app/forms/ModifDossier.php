<?php

namespace app\forms;

use app\modeles;

class ModifDossier extends \core\Form {
    protected $description;
    protected $id;
    
    public function valider () {
        
    }

    public function action() {
        $dossier = \core\DAO::Dossier()->find($this->id);
        $dossier->setDescription($this->description);
        $dossier->sauvegarder();
        
        \core\MainControleur::rediriger("detailsDossier/$this->id");
    }
}