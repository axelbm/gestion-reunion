<?php

namespace app\forms;

use app\modeles;

class ModifCompteRendu extends \core\Form {
    protected $compterendu;
    protected $id;
    
    public function valider () {
        
    }

    public function action() {
        $pointdordre = \core\DAO::PointDordre()->find($this->id);
        $pointdordre->setCompteRendu($this->compterendu);
        $pointdordre->sauvegarder();
        
    }
}