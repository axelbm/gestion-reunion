<?php

namespace app\forms;

class Inscription extends \core\Form {
    protected $date;
    
    public function valider () {
        if ($date == "") {
            $this->ajouterErreur("date", "Date obligatoire");
        }
    }
}