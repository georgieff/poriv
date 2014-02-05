<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of UrlHelper.php (KatiePHP) /system/helpers
/* * ************************************************************************ */

/*
 * function baseURL
 * return the base url of the application
 */

if (!function_exists('baseURL')) {

    function baseURL() {
        $KT = new KT_Config;
        return $KT->getConfigData('base_url');
    }

}
/* * ************************************************************************ */

/*
 * function baseURL
 * return the base url of the application with given path
 *  parameters:
 *      @uri : string expected (optional)
 */

if (!function_exists('siteURL')) {

    function siteURL($uri = '') {
        $KT = new KT_Config;
        return $KT->siteURL($uri);
    }

}
/* * ************************************************************************ */

/*
 * function redirect
 * redirects : )
 *  parameters:
 *      @uri : string expected (optional)
 *      @method : string expected (optional)
 *      @httpResponseCode : integer expected (optional)
 */

if (!function_exists('redirect')) {

    function redirect($uri = '', $method = 'location', $httpResponseCode = 302) {
        if (!preg_match('#^https?://#i', $uri)) {
            $uri = siteURL($uri);
        }
        switch ($method) {
            case 'refresh' : header("Refresh:0;url=" . $uri);
                break;
            default : header("Location: " . $uri, TRUE, $httpResponseCode);
                break;
        }
        exit;
    }

}
/* * ************************************************************************ */

/*
 * function redirect
 * make text to a url string
 *  parameters:
 *      @str : string expected
 *      @separator : string expected (optional)
 *      @lowercase : boolean expected (optional)
 */

if (!function_exists('urlTitle')) {

    function urlTitle($str, $separator = 'dash', $lowercase = FALSE) {
        if ($separator == 'dash') {
            $search = '_';
            $replace = '-';
        } else {
            $search = '-';
            $replace = '_';
        }

        $trans = array(
            '&\#\d+?;' => '',
            '&\S+?;' => '',
            '\s+' => $replace,
            '[^a-z0-9\-\._]' => '',
            $replace . '+' => $replace,
            $replace . '$' => $replace,
            '^' . $replace => $replace,
            '\.+$' => ''
        );

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#i", $val, $str);
        }

        if ($lowercase === TRUE) {
            $str = strtolower($str);
        }

        return trim(stripslashes($str));
    }

}
/* * ************************************************************************ */

/*
 * function urlPrepare
 * prepare url (adds http to a string if it's missing)
 *  parameters:
 *      @str : string expected
 */

if (!function_exists('urlPrepare')) {

    function urlPrepare($str) {
        if ($str == 'http://' OR $str == '') {
            return '';
        }

        $url = parse_url($str);

        if (!$url OR !isset($url['scheme'])) {
            $str = 'http://' . $str;
        }

        return $str;
    }

}
/* * ************************************************************************ */
// End of the file UrlHelper.php