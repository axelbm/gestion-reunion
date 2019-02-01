<?php

namespace core;

class Vue {

    private $titre = SITE_NOM;
    private $vueFile;
    private $jsVars = array();
    private $vars = array();
    private $contenue;


    public function __construct(string $vueFile) {
        $this->vueFile = $vueFile;
    }
	
    public function afficher() {
        extract($this->vars);

        $vue = $this;
        $controleur = MainControleur::getInstance();
        $titre = $this->titre;

        ob_start();
		require VUEROOT.$this->vueFile.'.php';
        $contenue = ob_get_clean();

        require VUEROOT.'dispositions/index.php';
    }

    /**
     * Inject une valeur dans le context de la vue
     *
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value) {
        $this->vars[$key] = $value;
    }


    /**
     * Inject une valeur dans le context du Javascript
     *
     * @param string $key
     * @param mixed $value
     */
    public function setJSVar(string $key, $value) {
        $this->jsVars[$key] = $value;
    }

    public function getJSVars() : array {
        return $this->jsVars;
    }


    public function setTitre(string $titre) : void {
        $this->titre = $titre;
    }
}