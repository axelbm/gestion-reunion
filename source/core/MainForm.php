<?php

namespace core;

class MainForm {
	static private $instance = null;


	/**
	 * Execute le controleur lié a l'action demandé
	 * 	Si un controleur retourne un erreur, la page va etre redirigé vers une page d'erreur
	 *
	 * @param string $action
	 * @param array $params
	 */
	static function executer(string $action) : void {
		$formClass = "\\app\\forms\\" . ucfirst($action);

		if (self::exists($action)) {
			$form = new $formClass();

			self::$instance = $form;

			$err = $form->valider();

			if (!is_null($err)) {
				self::executerErreur($err);
			}
		}

		exit();
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
    static function nouveauFormId(string $action) : string {
        $id = Util::randomKey();

        Session::ajouterFormAction($action, $id);

        return $id;
    }

	/**
	 * Retourne le controleur utilisé
	 *
	 * @return Form
	 */
	static function getInstance() : Form {
		return self::$instance;
	}
}