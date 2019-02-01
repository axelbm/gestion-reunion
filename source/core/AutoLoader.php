<?php

namespace core;

class AutoLoader {
    static public function loader($name) { 
        $args = explode("\\", $name);
        $classname = array_pop($args);

        $path = ROOT;

        for ($i = 0, $count = count($args); $i < $count; ++$i) {
            $path .= $args[$i] . "/";

            if (!is_dir($path)) {
                return;
            }
        }

        $path .= "$classname.php";

        if (is_file($path)) {
            require_once $path;
        }
    }
}