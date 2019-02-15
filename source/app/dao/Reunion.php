<?php

namespace app\dao;

use \core\DAO;
use \core\Database;
use \app\modeles;

class Reunion extends DAO {
    static private $nppDefaut = 10;

    protected $table = "reunions";

    protected $proprietes = array(
        "Id" => "reunionid:int:PK,AI",
        "Date" => "date:datetime",
        "Createur" => "createur:string",

        "PointDordres" => "Id:PointDordre:FK:reunionid",
        "Participations" => "Id:Participation:FK:reunionid"
    );

    /**
     * Undocumented function
     *
     * A faire : un selecteur de date dans l'interface
     * @param \DateTime $date
     * @return array
     */
    public function recherche(\DateTime $date) : array {
        return $this->select("WHERE date = $date");
    }

    /**
     * Undocumented function
     *
     * @param integer $page
     * @param string|null $courriel
     * @param integer|null $npp Nombre par fucking page
     * @return array
     */
    public function getListe(int $page, ?string $courriel, ?int $npp = null) : array{
        if (is_null($npp))
            $npp = self::$nppDefaut;

        $select = "";

        if ($courriel != null)
            $select = "INNER JOIN participations
                ON reunions.reunionid = participations.reunionid
                WHERE participations.courriel = '$courriel'";

        $select .= "LIMIT ".$page*$npp.", $npp ORDER BY date";

        return $this->select($select);
    }

    public function getListeParDate(int $page, ?string $courriel, ?int $npp = null) : array{
        if (is_null($npp))
            $npp = self::$nppDefaut;

        if ($courriel != null)
            $select = "INNER JOIN participations
                ON reunions.reunionid = participations.reunionid
                WHERE participations.courriel = '$courriel' AND ";
        else 
            $select = "WHERE ";

        $select .= "date > CURDATE() LIMIT ".$page*$npp.", $npp ORDER BY date";

        return $this->select($select);
    }

    public function getListeParDossier(int $page, modeles\Dossier $dossier, ?int $npp = null) : array{
        return $this->select("INNER JOIN pointdordres ON reunions.reunionid = pointdordres.reunionid
                                WHERE pointdordres.dossierid = ".$dossier->getId()." ORDER BY date LIMIT ".$page*$npp.", $npp");
    }

    public function getPage(?int $npp = null) : int{
        if (is_null($npp))
            $npp = self::$nppDefaut;

        $statement = Database::query("select count(reunionid) from reunions");
        $result = $statement->fetch();
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }

    public function getPageParDossier(modeles\Dossier $dossier, ?int $npp = null) : int{
        if (is_null($npp))
            $npp = self::$nppDefaut;

        $statement = Database::query("select count(reunions.reunionid) from reunions 
                                    INNER JOIN pointdordres ON reunions.reunionid = pointdordres.reunionid
                                    WHERE pointdordres.dossierid = ".$dossier->getId());
        $result = $statement->fetch();
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }

    public function getListeParUtilisateur(int $page, modeles\Utilisateur $utilisateur, ?int $npp = null) : array{
        if (is_null($npp))
            $npp = self::$nppDefaut;

        return $this->select("INNER JOIN participations ON reunions.reunionid = participations.reunionid
                                WHERE participations.courriel = '".$utilisateur->getCourriel()."' ORDER BY date LIMIT ".$page*$npp.", $npp");
    }

    public function getPageParUtilisateur(modeles\Utilisateur $utilisateur, ?int $npp = null) : int{
        if (is_null($npp))
            $npp = self::$nppDefaut;

        $statement = Database::query("select count(reunions.reunionid) from reunions 
                                    INNER JOIN participations ON reunions.reunionid = participations.reunionid
                                    WHERE participations.courriel = '".$utilisateur->getCourriel()."'");
        $result = $statement->fetch();
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }

    public function getListeParCreateur(int $page, modeles\Utilisateur $utilisateur, ?int $npp = null) : array{
        if (is_null($npp))
            $npp = self::$nppDefaut;

        return $this->select("WHERE createur = '".$utilisateur->getCourriel()."' ORDER BY date LIMIT ".$page*$npp.", $npp");
    }

    public function getPageParCreateur(modeles\Utilisateur $utilisateur, ?int $npp = 10) : int{
        if (is_null($npp))
        $npp = self::$nppDefaut;


        $statement = Database::query("select count(reunionid) from reunions 
                                    WHERE createur = '".$utilisateur->getCourriel()."'");
        $result = $statement->fetch();
        $nombre = $result[0];
        return ceil($nombre / $npp);
    }

    // public function trouver($id) : ?modeles\Reunion {
        
    //     return $this;
    // }
}