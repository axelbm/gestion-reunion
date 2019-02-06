<?php

namespace app\forms;

class Inscription extends \core\Form {
    protected $reunionid;
    protected $titre;
    protected $description;
    protected $dossierid;
    
    public function valider () {
        if ($reunionid == "") {
            $this->ajouterErreur("reunionid", "Réunion obligatoire");
        }
        if ($titre == "") {
            $this->ajouterErreur("titre", "Titre obligatoire");
        }
        if ($dossierid == "") {
            $this->ajouterErreur("dossierid", "Dossier obligatoire");
        }
    }
}