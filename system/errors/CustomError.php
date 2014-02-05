<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of CustomError.php (KatiePHP) /system/errors
/* * ************************************************************************ */
Class CustomError {

    public $errorMessage = '';
    public $errorHeading = '';
    public $errorCode = '';

    public function index() {
        setStatusHeader($this->errorCode);
        echo $this->errorHeading . '<br>';
        echo $this->errorMessage;
    }

}

// End of the file CustomError.php
