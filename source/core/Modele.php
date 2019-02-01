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
                $propCle = $prop["key"];

                if (gettype($args[0]) == $prop["type"])
                    $this->$propCle = $args[0];
                else
                    throw(new TypeError("Argument 1 passed to ".get_class($this)."->$name() must be an ".$prop["type"].", ".gettype($args[0])." given"));

                return;
            }
        }
        
        throw new Exception("Call to undefined method \"$name\"");
    }
    
}
