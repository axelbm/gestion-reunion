<?php

namespace core;

class Vue {

    private $titre = SITE_NOM;
    private $vueFile;
    private $jsVars = array();
    private $vars = array();
    private $contenue;

    /**
     * Constructeur de Vue avec le fichier de sa vue.
     *
     * @param string $vueFile
     */
    public function __construct(string $vueFile) {
        $this->vueFile = $vueFile;
    }
    
    /**
     * Affiche le html de la vue.
     *
     * @return void
     */
    public function afficher() {
        // Extrait les variables stockés dans le vue
        extract($this->vars);

        // Définie des variables impotantes pour la vue
        $vue = $this;
        $controleur = MainControleur::getInstance();
        $titre = $this->titre;

        // Emmagazine le code html du fichier de la vue pour l'injecter dans l'index
        ob_start();
		require VUEROOT.$this->vueFile.'.php';
        $contenue = ob_get_clean();

        require VUEROOT.'dispositions/index.php';
    }

    /**
     * Injecte une valeur dans le context de la vue
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

    /**
     * Retourne la liste des variables du context Javascript
     *
     * @return array
     */
    public function getJSVars() : array {
        return $this->jsVars;
    }

    /**
     * Modifie le titre de la page
     *
     * @return array
     */
    public function setTitre(string $titre) : void {
        $this->titre = $titre;
    }
}