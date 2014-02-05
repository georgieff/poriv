<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of KT_Models.php (KatiePHP) /system/core
/* * ************************************************************************ */
class KT_Models {

    public function __construct() {
        
    }

    public function __get($key) {
        $KT = & KT_Controllers::get_instance();
        return $KT->$key;
    }

}

// End of the file KT_Models.php