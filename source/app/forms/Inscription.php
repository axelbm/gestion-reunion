<?php

namespace app\forms;

use \core\DAO;
use \app\modeles;

class Inscription extends \core\Form {
    public $courriel;
    public $motDePasse;
    public $confirmMotDePasse;
    public $nom;
    public $prenom;
    public $cleInvitation;

    public function valider () {
        if ($this->courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }

        if ($this->motDePasse == "") {
            $this->ajouterErreur("motDePasse", "Mot de passe obligatoire");
        }
        elseif ($this->motDePasse != $this->confirmMotDePasse) {
            $this->ajouterErreur("motDePasse", "Les deux mot de passe doivent être identique");
        }
        
        $invitation = DAO::Invitation()->find($this->courriel);

        if ($invitation->validerCle($this->cleInvitation)){
            $this->ajouterErreur("cleInvitation", "Clé d'invitation incorrecte");
        }
    }

    public function action() {
        var_dump($this->courriel);
        $user = new modeles\Utilisateur($this->courriel, $this->nom, $this->prenom, $this->motDePasse);
        $user->sauvegarder();

        \core\MainControleur::rediriger("connexion");
    }
}