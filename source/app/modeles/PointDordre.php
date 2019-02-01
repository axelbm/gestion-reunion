<?php

namespace app\modeles;

use \core\Modele;

use \app\dao\PointDordre as dao;

class PointDordre extends Modele {
    protected $pointdordreid;
    protected $reunionid;
    protected $titre;
    protected $description;
    protected $dossierid;
    protected $compterendu;
}
