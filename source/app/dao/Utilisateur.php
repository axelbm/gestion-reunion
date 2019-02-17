<?php

namespace app\dao;

use \core\DAO;
use \app\modeles;

class Utilisateur extends DAO {
    protected $table = "utilisateurs";

    protected $proprietes = array(
        "Courriel" => "courriel:string:PK",
        "Nom" => "nom:string",
        "Prenom" => "prenom:string",
        "MotDePasse" => "motdepasse:string",
        "Administrateur" => "administrateur:int",
        
        "Participations" => "Courriel:Participation:FK:courriel"
    );


    public function obtenirAdministrateurs() : array {
        return $this->select("WHERE administateur >= 1");
    }

    public function obtenirSuperAdministrateurs() : array {
        return $this->select("WHERE administateur = 2");
    }

    public function recherche(string $nom) : array{
        return $this->select("WHERE CONTAINS((nom + ' ' + prenom, prenom + ' ' + nom, courriel), '$nom')");
    }

    public function listeInvitation(modeles\Reunion $reunion) : array{
        $utilisateur = \app\outils\Session::getUtilisateur();
        return $this->select("WHERE courriel not in (select courriel in participation where reunionid = ?) and courriel not ?", $reunion->getId(), $utilisateur->getCourriel());
    }
}
