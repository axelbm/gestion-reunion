<?php

namespace app\modeles;

use \app\dao\Utilisateur as dao;

class Utilisateur extends \core\Modele {
    protected $courriel;
    protected $nom;
    protected $prenom;
    protected $motdepasse;
    protected $administrateur;
}
