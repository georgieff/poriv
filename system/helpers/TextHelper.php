<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of TextHelper.php (KatiePHP) /system/helpers
/* * ************************************************************************ */

/*
 * function cleanFromXSS
 * clean the text from dangerous tags
 *  parameters:
 *      @str : string expected (optional)
 */

if (!function_exists('cleanFromXSS')) {

    function cleanFromXSS($str = '') {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

}
/* * ************************************************************************ */

// End of the file TextHelper.php