<?php

namespace app\outils;

use \app\modeles\Utilisateur as Utilisateur;


class Session extends \core\Session {

    static public function getUtilisateur() : ?Utilisateur {
        return null;
    } 

    static public function setUtilisateur(Utilisateur $user) {
        // $_SESSION["user"]...
    }

}