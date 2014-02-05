<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of KT_ControllerHook.php (KatiePHP) /system/core
/* * ************************************************************************ */
/*
 *  function void callController
 *  parameters 
 *      @fullUrl : string expected
 *      @defaultController : string expected
 *      @allowedChars : string expected
 */

if (!function_exists('callController')) {

    function callController($fullUrl, $defaultController, $allowedChars) {
        // check if the url is valid
        if (preg_match("/[^" . $allowedChars . "]/", $fullUrl)) {
            exit('BAD URL');
        }
        $urlArray = array();
        $fullUrl = rtrim($fullUrl, '/');
        $urlArray = explode("/", $fullUrl);
        $subAppFolder = APPURL . 'controllers' . DS;
        if ($urlArray[0]) {
            while (is_dir($subAppFolder . $urlArray[0])) {
                $subAppFolder .= $urlArray[0] . DS;
                array_shift($urlArray);
                if (empty($urlArray)) {
                    error404();
                }
            }
        } else {
            array_shift($urlArray);
        }

        if (isset($urlArray[0])) {
            $controllerName = $urlArray[0];
            $controllerName = ucfirst(strtolower($controllerName));
            array_shift($urlArray);
        } else {
            $controllerName = ucfirst(strtolower($defaultController));
        }

        if (isset($urlArray[0])) {
            $controllerAction = $urlArray[0];
            array_shift($urlArray);
        } else {
            $controllerAction = 'index';
        }
        $controllerQuery = $urlArray;
        $controllerFile = $controllerName . '.php';
        //check if the file exist
        if (!file_exists($subAppFolder . $controllerFile)) {
            error404('404 Class ' . $controllerName . ' not found');
        }
        // require controller file <<<
        require_once $subAppFolder . $controllerFile;

        if ((int) method_exists($controllerName, $controllerAction)) {
            $controllerObject = new $controllerName();
            call_user_func_array(array($controllerObject, $controllerAction), $controllerQuery);
        } else {
            error404('Method "' . $controllerAction . '" not found in "' . $controllerName . '" class.');
        }
    }

}

// End of the file KT_ControllerHook.php


