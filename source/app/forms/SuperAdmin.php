<?php

namespace app\forms;

use core\DAO;

class SuperAdmin extends \core\Form {
    /** @var string */
    public $courriel;
    /** @var bool */
    public $admin;

    public function valider (){
        $administrateur = \app\outils\Session::getUtilisateur();
        if(!$administrateur->estSuperAdministrateur()){
            $this->ajouterErreur("admin", "");
            \app\outils\Notification::ajouterPopup("Erreur", "Fonction réservé au Superadmin.<br>Vous n'avez pas suffisament de droit.",["tail"=>"sm"]);
        }

        if (!$this->validerChamp("Courriel", $this->courriel)) {
            $this->ajouterErreur("courriel", "Courriel invalide");
        }

        $utilisateur = \core\DAO::Utilisateur()-> find($this->courriel);
        if ($utilisateur->estSuperAdministrateur()) {
            $this->ajouterErreur("admin", "");
            \app\outils\Notification::ajouterPopup("Erreur", "Cet utilisateur est Superadmin.<br>Vous ne pouvez pas changer ses droits.",["tail"=>"sm"]);
        }elseif($utilisateur->estAdministrateur() == $this->admin){
            $this->ajouterErreur("admin", "");
            \app\outils\Notification::ajouterPopup("Erreur", "Cet utilisateur a déjà ces droit.",["tail"=>"sm"]);
        }

    }

    public function action() {
        $utilisateur = \core\DAO::Utilisateur()-> find($this->courriel);
        if ($this->admin == true){
            $utilisateur->setAdministrateur(1);
        }elseif($this->admin == false){
            $utilisateur->setAdministrateur(0);
        }
        $utilisateur->sauvegarder();
        // \core\MainControleur::rediriger("accueil");
    }
}