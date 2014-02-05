<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of Error404.php (KatiePHP) /system/errors
/* * ************************************************************************ */
Class Error404 extends KT_Controllers {

    public $errorMessage = '';

    public function index() {
        setStatusHeader(404);
        echo $this->errorMessage;
    }

}

// End of the file Error404.php