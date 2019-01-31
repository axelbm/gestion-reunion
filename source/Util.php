<?php

class Util {

    public static function className(string $class) : string {
        if ($pos = strrpos($class, '\\')) return substr($class, $pos + 1);
    }

    public static function objectName(object $obj) : string {
        $class = get_class($obj);

        return self::className($class);
    }

    public static function parsProprietes(array $args) : array {
        return $args;
    }
}