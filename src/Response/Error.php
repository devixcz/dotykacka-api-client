<?php

namespace DotykackaPHPApiClient\Response;

class Error
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }
}
