<?php

namespace app\modeles;

use \app\dao\Utilisateur as UtilisateurDAO;

class Utilisateur extends \Modele {
    protected $courriel;
    protected $nom;
    protected $prenom;
    protected $motdepasse;
    protected $administrateur;
}
