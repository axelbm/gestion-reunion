<?php

namespace app\forms;

class AjouterReunion extends \core\Form {
    protected $date;
    
    public function valider () {
        if ($this->date == "") {
            $this->ajouterErreur("date", "Date obligatoire");
        }
    }
}