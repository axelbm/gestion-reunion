<?php

namespace core;

class FormView {
    public $id;
    public $form;

    public function __construct(string $action) {
        $info = Form::nouveauFormId($action);
        $this->id = $info[0];
        $pos = $info[1];

        $form = Form::getInstance();

        if (isset($form) && $form->getPosition() == $pos) {
            $this->form = $form;
        }
    }

    public function get($cle) {
        if (isset($this->form)) {
            if (\property_exists($this->form, $cle)) {
                return $this->form->$cle;
            }
        }
    }

    public function erreur($cle) {
        if (isset($this->form)) {
            if (\property_exists($this->form, $cle)) {
                return $this->form->getErreur($cle);
            }
        }
    }
}