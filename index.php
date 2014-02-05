<?php

// Start of index.php (KatiePHP) /rootdir
/* * ************************************************************************ */
// set the environment <<<
define('ENVIRONMENT', 'development');

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;

        case 'testing':
        case 'production':
            error_reporting(0);
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}
/* * ************************************************************************ */
//application folder <<<
$appFolder = 'app';
/* * ************************************************************************ */
//system folder <<<
$sysFolder = 'system';
/* * ************************************************************************ */
// set directory separator (for linux or windows) <<<
define('DS', DIRECTORY_SEPARATOR);
/* * ************************************************************************ */
//set root directory <<<
define('BASEURL', dirname(__FILE__) . DS);
/* * ************************************************************************ */
//set application folder <<<
define('APPURL', BASEURL . $appFolder . DS);
/* * ************************************************************************ */
//set application folder <<<
define('SYSURL', BASEURL . $sysFolder . DS);
/* * ************************************************************************ */

//call Katie... she will handle this : )
require_once SYSURL . 'core' . DS . 'KT_Katie.php';
/******************************************************************************/
// End of the file index.php
// rootdir