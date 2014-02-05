<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}
// Start of KT_Katie.php (KatiePHP) /system/core
/* * ************************************************************************ */
// call basic Core classes <<<
require_once SYSURL . 'core' . DS . 'KT_Config.php';
require_once SYSURL . 'core' . DS . 'KT_Errors.php';
require_once SYSURL . 'core' . DS . 'KT_Controllers.php';
require_once SYSURL . 'core' . DS . 'KT_Models.php';
require_once SYSURL . 'core' . DS . 'KT_Views.php';
require_once SYSURL . 'core' . DS . 'KT_Loader.php';

// call base config files <<<
require_once BASEURL . 'config' . DS . 'appconfig.php';
require_once BASEURL . 'config' . DS . 'autoload.php';
require_once BASEURL . 'config' . DS . 'routing.php';

//reroute requested url
$reqUrl = $_GET['url'];
foreach ($route as $rKey => $rVal) {
    if (strpos($reqUrl, $rKey) === 0) {
        $reqUrl = $rVal . substr($reqUrl, strlen($rKey));
    }
}
//set requested url <<<
/* * ************************************************************************ */
define('REQURL', $reqUrl);

// set the charset of the page using header
header('Content-Type: text/html; charset=' . $config['charset']);

//load ALL the user defined core classes
if ($coreHandler = opendir(APPURL . 'core')) {
    while (false !== ($coreFile = readdir($coreHandler))) {
        if ($coreFile != "." && $coreFile != "..") {
            require_once APPURL . 'core' . DS . $coreFile;
        }
    }
    closedir($coreHandler);
}
// call Exception and Error handler <<<
require_once SYSURL . 'core' . DS . 'KT_Exceptions.php';
// call ControllerHook <<<
require_once SYSURL . 'core' . DS . 'KT_ControllerHook.php';
callController(REQURL, $config['default_controller'], $config['url_chars_allowed']);
// End of the file KT_Katie.php