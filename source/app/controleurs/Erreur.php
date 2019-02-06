<?php

namespace app\controleurs;

class Erreur extends \core\Controleur {

    public function action(array $args) : ?\Exception {
        $err = $args[0];

        $vue = new \core\Vue("erreur");

        $vue->setDisposition("erreur");

        $vue->set("erreur", $err);
        $vue->set("code", $err->getCode());
        $vue->set("message", $err->getMessage());

        $vue->afficher();

        return null;
    }

}
