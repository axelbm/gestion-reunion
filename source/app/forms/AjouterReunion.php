<?php

namespace app\forms;

use app\modeles;

class AjouterReunion extends \core\Form {
    public $date;
    public $heure;
    private $createur;
    
    public function valider () {
        if ($this->date == "") {
            $this->ajouterErreur("date", "Date obligatoire");
        }
        if ($this->heure == "") {
            $this->ajouterErreur("heure", "Heure obligatoire");
        }
        $this->createur = \app\outils\Session::getUtilisateur()->getCourriel();
    }

    public function action() {
        $datetime = $this->date." ".$this->heure;

        $reunion = new modeles\Reunion(new \DateTime($datetime), $this->createur);
        $reunion->sauvegarder();

        $participation = new modeles\Participation($reunion->getId(), $this->createur, "Org");
        $participation->sauvegarder();

        \core\MainControleur::rediriger("reunionCreee");
    }
}