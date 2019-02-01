<?php

namespace app\controleurs;

class Erreur extends \core\Controleur implements \core\iAction {

    public function action(array $args) : ?\Exception {
        $err = $args[0];

        $vue = new \core\Vue("erreur");

        $vue->set("code", $err->getCode());

        $vue->afficher();

        return null;
    }

}
