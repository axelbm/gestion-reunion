<?php

// va etre le premier controleur qui etre appelé par le rooter
// Il va appeler le controleur correspondant a la requete

namespace core;

class MainControleur {

	static private $instance = null;

	static function executer(string $action, array $params) : void {
		$controleurClass = "\\app\\controleurs\\" . ucfirst($action);

		if (self::exists($action)) {
			$ctrl = new $controleurClass();

			self::$instance = $ctrl;

			$err = $ctrl->action($params);

			if (!is_null($err)) {
				self::executerErreur($err);
			}
		} else {
			self::executerErreur(new \Exception("", 404));
		}
	}

	static function exists(string $action) : bool {
		return \class_exists("\\app\\controleurs\\" . ucfirst($action));
	}

	static function executerErreur(\Exception $err) {
		if (self::exists("Erreur_".$err->getCode())) {
			self::executer("Erreur_".$err->getCode(), array($err));
		} else {
			self::executer("Erreur", array($err));
		}
	}
}
