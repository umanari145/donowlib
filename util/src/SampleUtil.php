<?php
namespace SampleUtil;


class SampleUtil{


    private $message;

    public function __construct($message = ''){
        $this->message = $message;
    }

    public function showMessage(){
        echo $this->message;
    }
}