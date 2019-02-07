<?php

namespace app\controleurs\atraits;

trait Utilisateur {
    protected $utilisateur;

    public function verifierUtilisateur() {
        $this->utilisateur = \app\outils\Session::getUtilisateur();

        $this->vue->set("utilisateur", $this->utilisateur);
    }

    public function getUtilisateur() : ?\app\modeles\Utilisateur {
        return $this->utilisateur;
    }

    public function estConnecter() : bool {
        return !is_null($this->utilisateur);
    }
}