<?php

namespace libutil;

class EccubeUtil {
    private $message;

    public function __construct($message = '') {
        $this->message = $message;
    }

    public function showMessage() {
        echo $this->message;
    }

    public function addParam($a, $b) {
        return $a + $b;
    }
}