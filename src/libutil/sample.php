<?php
namespace libutil;

class util
{

    private $message;

    public function __construct($message = '')
    {
        $this->message = $message;
    }

    public function showMessage()
    {
        echo $this->message;
    }

}