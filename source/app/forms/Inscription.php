<?php

namespace app\forms;

class Inscription extends \core\Form {
    protected $courriel;
    protected $motDePasse;
    protected $confirmMotDePasse;
    protected $nom;
    protected $prenom;
    protected $cleInvitation;

    public function valider () {
        if ($courriel == "") {
            $this->ajouterErreur("courriel", "Courriel obligatoire");
        }

        if ($motDePasse == "") {
            $this->ajouterErreur("motDePasse", "Mot de passe obligatoire");
        }elseif ($motDePasse != $confirmMotDePasse) {
            $this->ajouterErreur("motDePasse", "Les deux mat de passe doivent être identique");
        }
        
        $i = \app\dao\Invitation::find($courriel);
        if ($i->validerCle(cleInvitation)){
            $this->ajouterErreur("cleInvitation", "Clé d'invitation incorrecte");
        }
    }
}