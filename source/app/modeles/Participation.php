<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Participation as dao;

class Participation extends Modele {
    /** @var int */
    protected $reunionid;
    
    /** @var string */
    protected $courriel;
    
    /** @var string */
    protected $statutid;

    public function accepter() {
        throw(new \Exception("Pas implementé"));
    }

    public function refuser() {
        throw(new \Exception("Pas implementé"));
    }

    public function __construct(int $reunionid=0, string $courriel="", string $statutid="") {
        $this->reunionid = $reunionid;
        $this->courriel = $courriel;
        $this->statutid = $statutid;
    }

    //methode badge
    public function badge (){
        switch($this->statutid){
            case "EnAt":
                echo "<span class=\"badge badge-info\">En attente</span>";
                break;
            case "Hes":
                echo "<span class=\"badge badge-warning\">Hésitant</span>";
                break;
            case "Abs":
                echo "<span class=\"badge badge-danger\">Absent</span>";
                break;
            case "Ann":
                echo "<span class=\"badge badge-dark\">Annuler</span>";
                break;
            case "Part":
                echo "<span class=\"badge badge-success\">Présent</span>";
                break;
            case "Term":
                echo "<span class=\badge badge-dark\">Terminée</span>";
                break;
        }
    }
}
