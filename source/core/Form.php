<?php

namespace core;

abstract class Form {
    protected $post = [];
    protected $erreurs = [];

    public function __construct() {
        echo "cc";
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public abstract function valider();

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function succes() : bool {
        return count($erreur) > 0;
    }

    /**
     * Undocumented function
     *
     * @param string $erreur
     * @return void
     */
    public function ajouterErreur(string $cle,string $erreur) {
        $erreus[$cle] = $erreur;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getErreurs() : array {
        return $erreurs;
    }

    /**
     * Undocumented function
     *
     * @param integer|null $index
     * @return string
     */
    public function getErreur(?string $index) : string {
        return $erreurs[$index];
    }
}