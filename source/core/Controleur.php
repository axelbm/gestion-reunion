<?php

namespace core;

abstract class Controleur {
    function __construct (){

    }

    /**
     * L'action du controleur qui permet d'afficher la vue
     *  retourne un exception en cas d'erreur
     *
     * @param array $args
     * @return \Exception|null
     */
    public abstract function action(array $args) : ?\Exception; 
}
