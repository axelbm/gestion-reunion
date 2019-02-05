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

    static public function connexion() : boolval {
        $c =$_REQUEST['courriel'];
        $m =$_REQUEST['motDePasse'];

        $resultat = true;
        //$resultat = FormConnexion::Vallider();


        // if ($c == "") {
        //     $_REQUEST["messages"]["courriel"] = "Courriel obligatoire";
        //     $resultat = FALSE;
        // }
        // if ($m == "") {
        //     $_REQUEST["messages"]["motDePasse"] = "Mot de passe obligatoire";
        //     $resultat = FALSE;
        // }
        // if ($resultat) {            
        //     $dao = new FavoriDAO();
        //     $u = $dao->findUser($c);
        //     if ($u == NULL) {                
        //         $_REQUEST["messages"]["courriel"] = "Utilisateur inexistant";
        //         $resultat = FALSE;
        //     }
        //     elseif ($u->getMotDePasse() != $m) {
        //         $_REQUEST["messages"]["motDePasse"] = "Mot de passe incorrect";
        //         $resultat = FALSE;
        //     }
        //     else {
        //         return true;		
        //     }
        // }

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