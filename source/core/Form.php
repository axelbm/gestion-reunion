<?php

namespace core;

abstract class Form {
    protected $action;
    protected $erreurs = [];

    public function __construct(string $action) {
        $this->action = $action;

        foreach ($_POST as $key => $value)
            if (\property_exists($this, $key))
                $this->$key = $value;
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
        return count($this->erreurs) == 0;
    }

    /**
     * Undocumented function
     *
     * @param string $erreur
     * @return void
     */
    public function ajouterErreur(string $cle, string $erreur) {
        $this->erreurs[$cle] = $erreur;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getErreurs() : array {
        return $this->erreurs;
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