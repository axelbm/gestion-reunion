<?php

namespace core;

class DAO {
    static protected $primaryKey;
    static protected $proprietes;
    static protected $parsedProprietes = null;

    static private function parseProprietes() : void {
        $dao = get_called_class();

        $dao::$parsedProprietes = array();
        
        var_dump($dao::$proprietes);
        foreach ($dao::$proprietes as $key => $value) {
            $args = explode(":", $value);
            $options = array();

            if (count($args) < 2 || count($args) > 3)
                throw(new Exception());

            if (count($args) == 3)
                $options = explode(",", $args[2]);

            $is_primatry = in_array("PK", $options);

            $dao::$parsedProprietes[$key] = array(
                "key" => $args[0],
                "type" => $args[1],
                "options" => $options,
                "isPrimaryKey" => $is_primatry
            );

            if ($is_primatry)
                $dao::$primaryKey = $key;
        }

        var_dump($dao::$parsedProprietes);
    }

    
    static public function create(array $params) : object {
        $dao = get_called_class();

        if ($dao::$parsedProprietes == null)
            $dao::parseProprietes();

        $className = "\\app\\modeles\\".Util::className(get_called_class());

        $obj = new $className();

        foreach ($dao::$parsedProprietes as $key => $prop) {
			$setter = "set$key";
            $obj->$setter($params[$prop["key"]]);
        }

        return $obj;
    }

    static public function getPropriete(string $nom) : array {
        $dao = get_called_class();

        if ($dao::$parsedProprietes == null)
            $dao::parseProprietes();
        
        return $dao::$parsedProprietes[$nom];
    }

    static public function getProprietes() : array {
        $dao = get_called_class();

        if ($dao::$parsedProprietes == null)
            $dao::parseProprietes();
        
        return $dao::$parsedProprietes;
    }

    static public function getPrimaryKey() : string {
        $dao = get_called_class();

        if ($dao::$parsedProprietes == null)
            $dao::parseProprietes();
        
        return $dao::$primaryKey;
    }




    

    static public function where(callable $condition) : array {
        return array();
    }

    static public function find(string $key) : object {
        return null; 
    }
}