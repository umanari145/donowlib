<?php
namespace libutil;


class sample{


    private $message;

    public function __construct($message = ''){
        $this->message = $message;
    }

    public function showMessage(){
        echo $this->message;
    }
}