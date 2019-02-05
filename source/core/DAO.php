<?php

namespace core;

abstract class DAO {
    static protected $proprietes;
    static protected $primaryKeys;
    static protected $parsedProprietes = null;

    /**
     * Convertie les propriétés du DAO
     *
     * @return void
     */
    static private function parseProprietes() {
        $dao = get_called_class();

        $dao::$parsedProprietes = array();
        $dao::$primaryKeys = array();

        /**
         * Exemples de propriétés :
         *  <Nom> => "<colonne>:<type>:<options, ...>:?<colonne étrangère>"
         * 
         *  "Courriel" => "courriel:string:PK",
         *  "Nom" => "nom:string",
         *  "Participations" => "Courriel:Participation:FK:courriel"
         * 
         *  Pour la clé étrangère, il faut indiquer la clé interne, l'objet etranger et pour finir, la colonne de l'objet etranger
         *      Il est possible d'ajouter l'option "S" pour obtenir un seul objet au lieu d'un array
         */

        foreach ($dao::$proprietes as $key => $value) {
            // Divide la propriété a chaque :
            $args = explode(":", $value);
            $options = array();

            // Déclanche une exception si il y a pas le bon nombre de paramettres
            if (count($args) < 2 || count($args) > 4)
                throw(new Exception());

            // Divise le 3em paramettre en options
            if (count($args) > 2)
                $options = explode(",", $args[2]);

            // Detecte si il y a l'option PK pour la clé primère
            $is_primatry = \in_array("PK", $options);

            // Construit la propriété a l'aide des paramettres
            $prop = array(
                "key" => $args[0],
                "type" => $args[1],
                "options" => $options,
                "isPrimaryKey" => $is_primatry
            );

            // Detecte si il y a une clé étrangère
            if (\in_array("FK", $options)) {
                $prop["fkColonne"] = $args[3];
            }

            $dao::$parsedProprietes[$key] = $prop;
            
            // Si il y a le PK, ajoute la propriete au cles primere
            if ($is_primatry)
                \array_push($dao::$primaryKeys, $key);
        }
    }

    
    
    /**
     * Retourne la propriete demandé
     * [key, type, options[\.\.\.], isPrimaryKey]
     *
     * @param string $nom
     * @return array
     */
    static public function getPropriete(string $nom) : array {
        $dao = get_called_class();

        if ($dao::$parsedProprietes == null)
            $dao::parseProprietes();
        
        return $dao::$parsedProprietes[$nom];
    }

    /**
     * Retourne la liste des propriétés
     *  [[key, type, options[\.\.\.], isPrimaryKey], \.\.\.]
     * 
     * @return array
     */
    static public function getProprietes() : array {
        $dao = get_called_class();

        if ($dao::$parsedProprietes == null)
            $dao::parseProprietes();
        
        return $dao::$parsedProprietes;
    }

    /**
     * Retourne la liste des primary keys
     *
     * @return array
     */
    static public function getPrimaryKeys() : array {
        $dao = get_called_class();

        if ($dao::$parsedProprietes == null)
            $dao::parseProprietes();
        
        return $dao::$primaryKeys;
    }

    /**
     * Retourne la N iem primary key du DAO
     *
     * @param integer $id
     * @return string
     */
    static public function getPrimaryKey(int $id=0) : string {
        $dao = get_called_class();

        if ($dao::$parsedProprietes == null)
            $dao::parseProprietes();
        
        return $dao::$primaryKeys[$id];
    }

    /**
     * Ajoute l'objet dans la base de données
     *
     * @param Modele $obj
     * @return void
     */
    static public function ajouter(Modele $obj) {
        $dao = get_called_class();

        $colonne = [];
        $colonneKey = [];
        $valeurs = [];

        // fait la liste des clés primères, colonnes et de leurs valeurs 
        foreach ($obj->getProprietes() as $key => $prop) {
            \array_push($colonne, $prop["key"]);
            \array_push($colonneKey, ":".$prop["key"]);
            $valeurs[":" . $prop["key"]] = Database::convertireVersDB($prop["value"], $prop["type"]);
        }

        $colonne = \implode(", ", $colonne);
        $colonneKey = \implode(", ", $colonneKey);
        

        $table = $dao::$table;
        $stendment = "INSERT INTO $table ($colonne) VALUES ($colonneKey)";

        $stmt = Database::prepare($stendment);
        $stmt->execute($valeurs);
    }

    /**
     * Sauvegarde l'objet dans la base de données
     *
     * @param Modele $obj
     * @return void
     */
    static public function sauvegarder(Modele $obj) {
        $dao = get_called_class();

        $condition = [];
        $colonne = [];
        $valeurs = [];

        foreach ($obj->getProprietes() as $key => $prop) {
            $valeurs[":" . $prop["key"]] = Database::convertireVersDB($prop["value"], $prop["type"]);

            if ($prop["isPrimaryKey"])
                \array_push($condition, $prop["key"] . " = :" . $prop["key"]);
            else
                \array_push($colonne, $prop["key"] . " = :" . $prop["key"]);
        }

        $condition = \implode(" AND ", $condition);
        $colonne = \implode(", ", $colonne);
        

        $table = $dao::$table;
        $stendment = "UPDATE $table SET $colonne WHERE $condition";

        $stmt = Database::prepare($stendment);
        $stmt->execute($valeurs);
    }
    
    /**
     * Supprime un objet de la base de données a partir de ses clés ou de son objet
     *
     * @param [type] ...$index
     * @return void
     */
    static public function supprimer(...$index) {
        $dao = get_called_class();

        $conditions = [];
        $valeurs = [];

        foreach ($index as $id => $valeur) {
            if ($id == 0 && $valeur instanceof Modele){
                foreach ($valeur->getProprietes() as $key => $prop) {
                    if ($prop["isPrimaryKey"]) {
                        $valeurs[":" . $prop["key"]] = Database::convertireVersDB($prop["value"], $prop["type"]);
                        \array_push($conditions, $prop["key"] . " = :" . $prop["key"]);
                    }
                }

                break;
            }

            $key = $dao::getPropriete($dao::getPrimaryKey($id))["key"];

            $valeurs[":$key"] = $valeur;
            \array_push($conditions, "$key = :$key");
        }

        $conditions = \implode(" AND ", $conditions);
        $table = $dao::$table;
        $stendment = "DELETE FROM $table WHERE $conditions";

        $stmt = Database::prepare($stendment);
        $stmt->execute($valeurs);
    }

    /**
     * Trouve un objet a partir de ses primary keys
     *
     * @param mixed ...$keys
     * @return Modele|null
     */
    static public function find(...$index) : ?Modele {
        $dao = get_called_class();

        $conditions = [];
        $valeurs = [];

        foreach ($index as $id => $valeur) {
            $key = $dao::getPropriete($dao::getPrimaryKey($id))["key"];

            $valeurs[":$key"] = $valeur;
            \array_push($conditions, "$key = :$key");
        }

        $conditions = \implode(" AND ", $conditions);
        $table = $dao::$table;
        $stendment = "SELECT * FROM $table WHERE $conditions";

        $stmt = Database::prepare($stendment);
        $stmt->execute($valeurs);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            return $dao::charger($result);
        }

        return null;
    }

    /**
     * Fait une liste d'objets a partir d'une requete sql.
     *
     * @param string|null $requete
     * @param array|null $input
     * @return array
     */
    static public function select(?string $requete="", ?array $input=[]) : array {
        $dao = get_called_class();

        $table = $dao::$table;
        $requete = "SELECT * FROM $table $requete";

        $stmt = Database::prepare($requete);
        $stmt->execute($input);

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $objs = [];

        foreach ($result as $id => $params)
            array_push($objs, $dao::charger($params));

        return $objs;
    }

    static public function getObjetEtranger(string $colonne, $valeur, ?string $condition="") {
        $dao = get_called_class();

        $prop = $dao::getPropriete($colonne);

        $fkDAO = "\\app\\dao\\".$prop["type"];

        $result = $fkDAO::select("WHERE ".$prop["fkColonne"]." = '$valeur'");

        if (in_array("S", $prop["options"]))
            return $result[0];
        else
            return $result;
    }

    /**
     * Créer un objet a partir de ses paramettres
     *
     * @param array $params
     * @return Modele
     */
    static public function charger(array $params) : Modele {
        $modele = "\\app\\modeles\\".Util::className(get_called_class());

        return $modele::toObject($params, true);
    }
}