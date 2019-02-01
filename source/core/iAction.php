<?php

namespace core;

interface iAction {

    public function action(array $args) : ?\Exception;

}