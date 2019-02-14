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

    public function __construct(string $reunionid="", string $titre="", string $description="", int $dossierid=0, string $compterendu="") {
        $this->reunionid = $reunionid;
        $this->titre = $titre;
        $this->description = $description;
        $this->dossierid = $dossierid;
        $this->compterendu = $compterendu;
    }
}
