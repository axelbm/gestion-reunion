<?php

namespace app\forms;

class Connexion extends \core\Form {
    protected $courriel;
    protected $motDePasse;

    public function valider () {
        var_dump(strlen($this->courriel));
        if (strlen($this->courriel) < 6)
            $this->ajouterErreur("courriel", "Courriel invalid");
    }
}