<?php

namespace core;

abstract class Controleur {
    function __construct (){

    }

    public abstract function action(array $args) : ?\Exception; 
}
