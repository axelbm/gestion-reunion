<?php

try {
    $date = new DateTime('03-21-2000');
    var_dump($date);
} catch (\Exception $e) {
    var_dump ($e);
}