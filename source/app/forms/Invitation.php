<?php

namespace app\forms;

class Inscription extends \core\Form {
    protected $courriel;
    
    public function valider () {
        if ($courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }elseif(\app\dao\Invitation::find($courriel)){
            $this->ajouterErreur("courriel", "Ce courriel à déja reçu une invitation");
        }
    }
}