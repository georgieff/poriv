<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of KT_Errors.php (KatiePHP) /system/core
/* * ************************************************************************ */

/*
 * function error404
 * creates 404 error page
 *  parameters:
 *      @errorMessage : string expected (optional)
 */

if (!function_exists('error404')) {

    function error404($errorMessage='') {
        $className = 'Error404';
        $Config = new KT_Config;
        $prefix = $Config->getConfigData('subclass_prefix');
        $path = SYSURL . 'errors' . DS . $className . '.php';
        $oPath = APPURL . 'errors' . DS . $prefix . $className . '.php';
        if (file_exists($path)) {
            require_once $path;
            if (file_exists($oPath)) {
                require_once $oPath;
                $className = $prefix . $className;
            }
            $KT = & KT_Controllers::get_instance();
            $KT->errorClass = new $className();
            if ($errorMessage) {
                $KT->errorClass->errorMessage = $errorMessage;
            }
            $KT->errorClass->index();
        }
        exit();
    }

}
/* * ************************************************************************ */

/*
 * function showError
 * creates custom error page
 *  parameters:
 *      @errorMessage : string expected (optional)
 *      @errorCode : integer expected (optional)
 *      @errorHeading : string expected (optional)
 */

if (!function_exists('showError')) {

    function showError($errorMessage='Something went wrong', $errorCode = 400, $errorHeading='Error') {
        $className = 'CustomError';
        $Config = new KT_Config;
        $prefix = $Config->getConfigData('subclass_prefix');
        $path = SYSURL . 'errors' . DS . $className . '.php';
        $oPath = APPURL . 'errors' . DS . $prefix . $className . '.php';
        if (file_exists($path)) {
            require_once $path;
            if (file_exists($oPath)) {
                require_once $oPath;
                $className = $prefix . $className;
            }
            $KT = & KT_Controllers::get_instance();
            $KT->errorClass = new $className();
            if ($errorMessage) {
                $KT->errorClass->errorMessage = $errorMessage;
            }
            $KT->errorClass->errorCode = $errorCode;
            if ($errorHeading) {
                $KT->errorClass->errorHeading = $errorHeading;
            }
            $KT->errorClass->index();
        }
        exit();
    }

}
/* * ************************************************************************ */

/*
 * function setStatusHeader
 * set header status code
 *  parameters:
 *      @statusCode : integer expected (optional)
 */
if (!function_exists('setStatusHeader')) {

    function setStatusHeader($statusCode = 200) {
        $statusText = '';
        $statusCodeArray = array(
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        if (isset($statusCodeArray[$statusCode]) AND $statusText == '') {
            $statusText = $statusCodeArray[$statusCode];
        }

        if ($statusText == '') {
            show_error('No status text available.  Please check your status code number or supply your own message text.', 500);
        }

        $server_protocol = (isset($_SERVER['SERVER_PROTOCOL'])) ? $_SERVER['SERVER_PROTOCOL'] : FALSE;

        if (substr(php_sapi_name(), 0, 3) == 'cgi') {
            header("Status: {$statusCode} {$statusText}", TRUE);
        } elseif ($server_protocol == 'HTTP/1.1' OR $server_protocol == 'HTTP/1.0') {
            header($server_protocol . " {$statusCode} {$statusText}", TRUE, $statusCode);
        } else {
            header("HTTP/1.1 {$statusCode} {$statusText}", TRUE, $statusCode);
        }
    }

}
/* * ************************************************************************ */

// End of the file KT_Errors.php