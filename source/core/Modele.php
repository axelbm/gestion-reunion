<?php

namespace core;

class Modele {

    public function __call(string $name, array $args) {
        $dao = "\\app\\dao\\".Util::objectName($this);

        if (substr($name, 0, 3) == "get") {
            $propNom = substr($name, 3);

            if (array_key_exists($propNom, $dao::getProprietes())) {
                $propCle = $dao::getPropriete($propNom)["key"];

                return $this->$propCle;
            }
        }
        elseif (substr($name, 0, 3) == "set") {
            $propNom = substr($name, 3);
            
            if (array_key_exists($propNom, $dao::getProprietes())) {
                $prop = $dao::getPropriete($propNom);

                if (!$prop["isPrimaryKey"]) {
                    $propCle = $prop["key"];

                    if (gettype($args[0]) == $prop["type"])
                        $this->$propCle = $args[0];
                    else
                        throw(new \TypeError("Argument 1 passed to ".get_class($this)."->$name() must be an ".$prop["type"].", ".gettype($args[0])." given"));

                    return;
                }
            }
        }
        
        throw new \Exception("Call to undefined method ".\get_called_class()."->$name()");
    }
    
    public function toArray() : array {
        $dao = "\\app\\dao\\".Util::objectName($this);

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

    public function sauvegarder() {
        $dao = "\\app\\dao\\".Util::objectName($this);


    }

    public function supprimer() {
        $dao = "\\app\\dao\\".Util::objectName($this);


    }

    static public function toObject(array $params) : object {
        $modele = get_called_class();
        $dao = "\\app\\dao\\".Util::className(get_called_class());

        $obj = new $modele();

        foreach ($dao::getProprietes() as $key => $prop) {
            $propkey = $prop["key"];
            
            $value = $params[$prop["key"]];

            if ($prop["type"] == "boolean")
                $value = $value == 1;

            $obj->$propkey = $value;
        }

        return $obj;
    }
}
