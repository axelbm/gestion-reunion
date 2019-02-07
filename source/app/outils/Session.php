<?php

namespace app\outils;

use \app\modeles\Utilisateur as Utilisateur;
use \core\DAO as DAO;


class Session extends \core\Session {


    static public function getUtilisateur() : ?Utilisateur {
        if (isset($_SESSION["utilisateur"])){
            return DAO::Utilisateur()->find($_SESSION["utilisateur"]);
        }

        return null;
    } 

    static public function connexion(Utilisateur $utilisateur) {
        $_SESSION["utilisateur"] = $utilisateur->getCourriel();
    }

    static public function deconnexion(){
        self::detruireSession();
    }
}