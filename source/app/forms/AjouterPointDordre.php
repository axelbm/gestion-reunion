<?php

namespace app\forms;

class AjouterPointDordre extends \core\Form {
    protected $reunionid;
    protected $titre;
    protected $description;
    protected $dossierid;
    
    public function valider () {
        if ($this->reunionid == "") {
            $this->ajouterErreur("reunionid", "Réunion obligatoire");
        }
        if ($this->titre == "") {
            $this->ajouterErreur("titre", "Titre obligatoire");
        }
        if ($this->dossierid == "") {
            $this->ajouterErreur("dossierid", "Dossier obligatoire");
        }
    }
}