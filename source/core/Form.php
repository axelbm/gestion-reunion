<?php

namespace core;

abstract class Form {
    static private $instance = null;
    
	/**
	 * Execute le controleur lié a l'action demandé
	 * 	Si un controleur retourne un erreur, la page va etre redirigé vers une page d'erreur
	 *
	 * @param string $action
	 * @param array $params
	 */
	static function executer(string $action, int $pos) : void {
		$formClass = "\\app\\forms\\" . ucfirst($action);

		if (self::exists($action)) {
			$form = new $formClass($action, $pos);

			self::$instance = $form;

			$form->valider();

			if ($form->succes())
				$form->action();
		}
	}

	static function trouverForm() {
		if (isset($_POST["formid"])) {
			$formId = $_POST["formid"];
			

			if ($info = Session::getFormAction($formId)) {
				self::executer($info[0], $info[1]);
			}
		}

		Session::viderFormAction();
	}

	/**
	 * Verifie si le controleur demandé existe
	 *
	 * @param string $action
	 * @return boolean
	 */
	static function exists(string $action) : bool {
		return \class_exists("\\app\\forms\\" . ucfirst($action));
    }
    
    /**
     * Undocumented function
     *
     * @param string $action
     * @return string
     */
    static function nouveauFormId(string $action) : array {
        $id = Util::randomKey();

        $pos = Session::ajouterFormAction($id, $action);

        return [$id, $pos];
    }

	/**
	 * Retourne le controleur utilisé
	 *
	 * @return Form
	 */
	static function getInstance() : ?Form {
		return self::$instance;
    }
    
    // 


    protected $action;
    protected $erreurs = [];
    protected $position = 0;

    public function __construct(string $action, int $pos) {
        $this->action = $action;
        $this->position = $pos;

        foreach ($_POST as $key => $value)
            if (\property_exists($this, $key))
                $this->$key = $value;
        // $this->parseProprietes();

        // foreach ($this->getProprietes() as $key => $prop) {
        //     if (!$this->validerChamp($key, $_POST[$key])) {

        //         $this->ajouterErreur($key, "Le champ $key est invalide.");
        //     }
            
        //     $this->$key = $_POST[$key];
        // }
    }

    public function parseProprietes() {
        $proprietes = [];

        foreach ($this->proprietes as $key => $value) {
            // Divide la propriété a chaque :
            $args = explode(":", $value);
            $options = [];

            // Déclanche une exception si il y a pas le bon nombre de paramettres
            if (count($args) < 1 || count($args) > 2)
                throw(new Exception());

            // Divise le 3em paramettre en options
            if (count($args) > 1)
                $options = explode(",", $args[1]);

            // Construit la propriété a l'aide des paramettres
            $prop = array(
                "type" => $args[0],
                "options" => $options
            );

            $proprietes[$key] = $prop;
        }

        $this->proprietes = $proprietes;
    }

    /**
     * Retourne la propriete demandé
     * [type, options[\.\.\.]]
     *
     * @param string $nom
     * @return array
     */
    public function getPropriete(string $nom) : array {
        return $this->proprietes[$nom];
    }

    /**
     * Retourne la liste des propriétés
     *  [[type, options[\.\.\.], \.\.\.]
     * 
     * @return array
     */
    public function getProprietes() : array {
        return $this->proprietes;
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
     * @return void
     */
    public abstract function action();

    /**
     * Undocumented function
     *
     * @param string $cle
     * @param mixed $valeur
     * @return boolean
     */
    public function validerChamp(string $type, $valeur) : bool {
        $validateur = "\\app\\forms\\validateurs\\".$type;

        
        if (\class_exists($validateur)) {
            return $validateur::valider($valeur);
        }
        elseif ($valeur instanceof $type) {
            return true;
        }

        return false;
    }

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
    public function getErreur(string $index) : ?string {
        if (isset($this->erreurs[$index]))
            return $this->erreurs[$index];
        
        return null;
    }


    public function getPosition() : int {
        return $this->position;
    }

    public function getAction() : string {
        return $this->action;
    }
}