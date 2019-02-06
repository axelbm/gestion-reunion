<?php

namespace app\forms;

class Invitation extends \core\Form {
    protected $courriel;
    
    public function valider () {
        if ($this->courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }
        elseif(\app\dao\Invitation::find($this->courriel)){
            $this->ajouterErreur("courriel", "Ce courriel a déjà reçu une invitation");
        }
    }
}