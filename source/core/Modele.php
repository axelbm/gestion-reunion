<?php

namespace core;

abstract class Modele {
    protected $surBD = false;

    /**
     * Definie les setter et getter.
     *
     * @param string $name
     * @param array $args
     * @return void
     */
    public function __call(string $name, array $args) {
        $dao = $this->dao();

        if (substr($name, 0, 3) == "get") {
            $propNom = substr($name, 3);
            $prop = $dao::getPropriete($propNom);

            if (isset($prop["fkColonne"])) {
                $methode = "get".$prop["key"];
                return $dao::getObjetEtranger($propNom, $this->$methode());
            }
            else {
                if (array_key_exists($propNom, $dao::getProprietes())) {
                    $propCle = $prop["key"];
    
                    return $this->$propCle;
                }
            }
        }
        elseif (substr($name, 0, 3) == "set") {
            $propNom = substr($name, 3);
            
            if (array_key_exists($propNom, $dao::getProprietes())) {
                $prop = $dao::getPropriete($propNom);

                if (!$prop["isPrimaryKey"] && !isset($prop["fkColonne"])) {
                    $propCle = $prop["key"];
                    $valeur = $args[0];

                    if (\method_exists($this, "onSet$propNom")) {
                        $methode = "onSet$propNom";

                        if (!\is_null($nv = $this->$methode($this->$propCle, $valeur)))
                            $valeur = $nv;
                    }

                    if (gettype($args[0]) == $prop["type"])
                        $this->$propCle = $valeur;
                    else
                        throw(new \TypeError("Argument 1 passed to ".get_class($this)."->$name() must be an ".$prop["type"].", ".gettype($args[0])." given"));

                    return;
                }
            }
        }
        
        throw new \Exception("Call to undefined method ".\get_called_class()."->$name()");
    }

    /**
     * Retourne la liste de Primary Keys sous forme d'array.
     * [[key, value], \.\.\.]
     *
     * @return array
     */
    public function getPrimaryKeys() : array {
        $dao = $this->dao();

        $pks = [];

        foreach ($dao::getPrimaryKeys() as $id => $key) {
            $methode = "get$key";
            $pks[$id] = ["key" => $dao::getPropriete($key)["key"], "value" => $this->$methode()];
        }

        return $pks;
    }

    /**
     * Retrourne la propriété demandé sous forme d'array.
     *  [key, value, type, options, isPrimaryKey]
     * 
     * @param string $key
     * @return array
     */
    public function getPropriete(string $key) : array {
        $dao = $this->dao();

        $prop = $dao::getPropriete($key);

        $get = "get$key";
        $prop["value"] = $this->$get();

        return $prop;
    }

    /**
     * Retrourne la liste propriétés sous forme d'array.
     *  [key = [key, value, type, options, isPrimaryKey], \.\.\.]
     *
     * @return array
     */
    public function getProprietes() : array {
        $dao = $this->dao();

        $props = [];
        
        foreach ($dao::getProprietes() as $key => $prop) {
            $get = "get$key";
            $prop["value"] = $this->$get();

            $props[$key] = $prop;
        }

        return $props;
    }

    /**
     * Ajouteur ou sauvegarde l'objet dans la base de données.
     *
     * @return void
     */
    public function sauvegarder() {
        $dao = $this->dao();

        if ($this->surBD) {
            $dao::sauvegarder($this);
        } else {
            $dao::ajouter($this);
        }
    }

    /**
     * Supprime l'objet de la base de données
     *
     * @return void
     */
    public function supprimer() {
        $dao = $this->dao();

        if ($this->surBD) {
            $dao::supprimer($this);
        }
    }
    
    /**
     * Convertie l'objet en array.
     *
     * @return array
     */
    public function toArray() : array {
        $dao = $this->dao();

        $arr = array();

        foreach ($dao::getProprietes() as $key => $prop) {
            $propkey = $prop["key"];
            
            $value = $this->$propkey;

            if ($prop["type"] == "boolean")
                $value = $value ? 1 : 0;

            $arr[$propkey] = $value;
        }

        return $arr;
    }

    /**
     * Retourne le nom du DAO de l'objet.
     *
     * @return string
     */
    public function dao() : string {
        return "\\app\\dao\\".Util::objectName($this);
    }

    /**
     * Créer un objet a l'aide d'un array.
     *
     * @param array $params
     * @return Modele
     */
    static public function toObject(array $params, ?bool $depuisDB=false) : Modele {
        $modele = get_called_class();
        $dao = "\\app\\dao\\".Util::className($modele);

        $obj = new $modele();

        foreach ($dao::getProprietes() as $key => $prop) {
            if (!isset($prop["fkColonne"])) {
                $propkey = $prop["key"];
                $obj->$propkey = Database::convertireVersPHP($params[$prop["key"]], $prop["type"]);
            }
        }

        if ($depuisDB)
            $obj->surBD = true;

        return $obj;
    }
}
