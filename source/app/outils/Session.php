<?php

namespace app\outils;

use \app\modeles\Utilisateur as Utilisateur;


class Session extends \core\Session {


    static public function getUtilisateur() : ?Utilisateur {
        if (isset($_SESSION["connecter"])){
            return $_SESSION["connecter"];
        }
        return null;
    } 

    static public function connexion() : bool {
        $c =$_REQUEST['courriel'];
        $m =$_REQUEST['motDePasse'];

        $resultat = true;
        //$resultat = FormConnexion::Vallider();


        if ($resultat){
            self::initSession();
            $_SESSION["connecter"] = $c;	 
        }

        return $resultat;
    }

    static public function deconnexion(){
        self::detruireSession();
    }
}