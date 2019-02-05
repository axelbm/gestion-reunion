<?php

namespace core;

class Session {
    
    static public function getFormAction(string $formId) : ?string {
        if (isset($_SESSION["formsId"][$formId]))
            return $_SESSION["formsId"][$formId];
        else
            return null;
    }

    static public function ajouterFormAction(string $formId, string $formAction) {
        $_SESSION["formsId"][$formId] = $formAction;
    }

    static public function viderFormAction() {
        $_SESSION["formsId"] = [];
    }

    static public function initializer() {
        if (!self::estOuverte()) {
            $_SESSION["token"] = Util::randomKey();
            $_SESSION["formsId"] = [];
        }
    } 

    static public function estOuverte() : bool {
        return isset($_SESSION) and isset($_SESSION["token"]);
    }

    static public function detruire(){
        // session_destroy();
    }
}