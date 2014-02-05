<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of HtmlHelper.php (KatiePHP) /system/helpers
/* * ************************************************************************ */

/*
 * function trimSlashes
 * removes any leading/trailing slashes from a string
 *  parameters:
 *      @str : string expected
 */

if (!function_exists('trimSlashes')) {

    function trimSlashes($str) {
        return trim($str, '/');
    }

}
/* * ************************************************************************ */

/*
 * function stripSlashes
 * removes aslashes contained in a string or in an array
 *  parameters:
 *      @str : string expected
 */

if (!function_exists('stripSlashes')) {

    function stripSlashes($str) {
        if (is_array($str)) {
            foreach ($str as $key => $val) {
                $str[$key] = strip_slashes($val);
            }
        } else {
            $str = stripslashes($str);
        }

        return $str;
    }

}
/* * ************************************************************************ */

/*
 * function stripQuotes
 * removes single and double quotes from a string
 *  parameters:
 *      @str : string expected
 */

if (!function_exists('stripQuotes')) {

    function stripQuotes($str) {
        return str_replace(array('"', "'"), '', $str);
    }

}
/* * ************************************************************************ */

/*
 * function quotesToEntities
 * converts single and double quotes to entities
 *  parameters:
 *      @str : string expected
 */
if (!function_exists('quotesToEntities')) {

    function quotesToEntities($str) {
        return str_replace(array("\'", "\"", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
    }

}
/* * ************************************************************************ */

/*
 * function randomString
 * generate random string
 *  parameters:
 *      @type : string expected (optional)
 *      @len : integer expected (optional)
 */

if (!function_exists('randomString')) {

    function randomString($type = 'alnum', $len = 8) {
        switch ($type) {
            case 'basic' : return mt_rand();
                break;
            case 'alnum' :
            case 'numeric' :
            case 'nozero' :
            case 'alpha' :
                switch ($type) {
                    case 'alpha' : $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        break;
                    case 'alnum' : $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        break;
                    case 'numeric' : $pool = '0123456789';
                        break;
                    case 'nozero' : $pool = '123456789';
                        break;
                }
                $str = '';
                for ($i = 0; $i < $len; $i++) {
                    $str .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
                }
                return $str;
                break;
            case 'unique' :
            case 'md5' :
                return md5(uniqid(mt_rand()));
                break;
        }
    }

}
/* * ************************************************************************ */

// End of the file StringHelper.php