<?php

namespace app\dao;

use \core\DAO;

class Participation extends DAO {
    protected $table = "participations";

    protected $proprietes = array(
        "ReunionID" => "reunionid:integer:PK",
        "Courriel" => "courriel:string:PK",
        "StatutID" => "statutid:string",

        "Utilisateur" => "Courriel:Utilisateur:FK,S:courriel",
        "Reunion" => "ReunionID:Reunion:FK,S:reunionid"
    );


    public function getParReunion(int $reunionid) {
        $result = \core\Database::query("SELECT participations.courriel, statutid, nom, prenom FROM participations
            INNER JOIN utilisateurs ON utilisateurs.courriel = participations.courriel
            WHERE reunionid = ? ORDER BY statutid", $reunionid);
        
        $participants = [];
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            array_push($participants, [
                "courriel" => $row["courriel"],
                "statut" => $row["statutid"],
                "nom" => $row["prenom"] . " " . $row["nom"]
            ]);
        }

        return $participants;
    }
}