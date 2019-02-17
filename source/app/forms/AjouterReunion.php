<?php

namespace app\forms;

use app\modeles;

class AjouterReunion extends \core\Form {
    protected $date;
    protected $heure;
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

        var_dump($datetime);
        var_dump(new \DateTime($datetime));
        var_dump($this->createur);
        $reunion = new modeles\Reunion(new \DateTime($datetime), $this->createur);
        $reunion->sauvegarder();

        \core\MainControleur::rediriger("accueil");
    }
}