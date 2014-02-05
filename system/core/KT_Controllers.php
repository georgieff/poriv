<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of KT_Controllers.php (KatiePHP) /system/core
/* * ************************************************************************ */
class KT_Controllers {

    private static $instance;

    public function __construct() {
        self::$instance = & $this;
        $this->load = new KT_Loader;
        $this->view = new KT_Views;
    }

    public static function &get_instance() {
        return self::$instance;
    }

}

// End of the file KT_Controllers.php