<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\Reunion as dao;

class Reunion extends Modele {
    /** @var int */
    protected $reunionid;

    /** @var \Datetime */
    protected $date;

    /** @var string */
    protected $createur;

    public function __construct(\DateTime $date= new \DateTime(), string $createur) {
        $this->date = $date;
        $this->createur =$createur;
    }

    /**
     * Undocumented function
     *
     * @param Utilisateur $user
     * @return Invitation
     */
    public function inviterUtilisateur(Utilisateur $user) : Invitation {
        throw(new \Exception("Pas implementé"));
    }

    /**
     * Undocumented function
     *
     * @param PointDordre $point
     * @return void
     */
    public function ajouterPointDordre(PointDordre $point) {
        throw(new \Exception("Pas implementé"));
    }

    public function estCreateur(Utilisateur $utilisateur) : bool {
        return $this->createur == $utilisateur->courriel;
    }
}