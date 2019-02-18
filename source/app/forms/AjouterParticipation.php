<?php

namespace app\forms;

use app\modeles;

class AjouterParticipation extends \core\Form {
    protected $reunionid;
    protected $courriels;
    
    public function valider () {
        if (empty($this->courriels)) {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }
        $this->reunionid = is_numeric($this->reunionid) ? intval($this->reunionid) : 0;
    }

    public function action() {
        foreach($this->courriels as $courriel){
            $participation = new modeles\Participation($this->reunionid, $courriel, "EnAt");
            $participation->sauvegarder();
        }
        \core\MainControleur::rediriger("ajouterParticipation?&reunionid=$this->reunionid");
    }
}