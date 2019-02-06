<?php

namespace app\forms;

class Inscription extends \core\Form {
    protected $reunionid;
    protected $courriel;
    
    public function valider () {
        if ($courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }
        if ($reunionid == "") {
            $this->ajouterErreur("reunionid", "Réunion obligatoire");
        }
    }
}