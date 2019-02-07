<?php

namespace app\forms;

use \core\DAO;

class Inscription extends \core\Form {
    protected $courriel;
    protected $motDePasse;
    protected $confirmMotDePasse;
    protected $nom;
    protected $prenom;
    protected $cleInvitation;

    public function valider () {
        if ($this->courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }

        if ($this->motDePasse == "") {
            $this->ajouterErreur("motDePasse", "Mot de passe obligatoire");
        }
        elseif ($this->motDePasse != $this->confirmMotDePasse) {
            $this->ajouterErreur("motDePasse", "Les deux mat de passe doivent être identique");
        }
        

        $invitation = DAO::Invitation()->find($courriel);

        if ($invitation->validerCle($this->cleInvitation)){
            $this->ajouterErreur("cleInvitation", "Clé d'invitation incorrecte");
        }
    }
}