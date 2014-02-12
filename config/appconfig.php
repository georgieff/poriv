<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of appconfig.php (KatiePHP) /config
/* * ************************************************************************ */
/* Change base_url
 * You can call this variable whereever you want in you application using
 * base_url() function. Use it for including css, javascript and other files.
 * EXAMPLE:
 *          $config['base_url'] = 'http://www.example.com/'; <<<
 */
$config['base_url'] = 'http://www.poriv.eu/';
$config['base_url'] = 'http://localhost/poriv/';

/* Change default_controller
 * Default controller is used to be loaded if another is not specified in the
 * URL. Make sure this controller exist and have an index method.
 * EXAMPLE:
 *          $config['default_controller'] = 'Home'; <<<
 */
$config['default_controller'] = 'Home';

/* Change character set
 * This determines which character set is used by default in various methods
 * that require a character set to be provided.
 * EXAMPLE:
 *          $config['charset'] = 'UTF-8'; <<<
 */
$config['charset'] = 'UTF-8';

/* Change user-defined class prefixes
 * Choose the prefix you will use in your custom class extending the core ones.
 * EXAMPLE:
 *          $config['subclass_prefix'] = 'UD_'; <<<
 *          (UD comes from UserDefined)
 * So your class names will be like UD_Controllers for example.
 */
$config['subclass_prefix'] = 'UD_';

/* Allowed URL Characters
 * This lets you specify with a regular expression which characters are permitted
 * within your URLs. If the given url doesn't match the pattern the system will
 * call 404 error Not Found. You can change the error by overriding the
 * callController() function.
 * EXAMPLE:
 *          $config['url_chars_allowed'] = 'A-Za-z 0-9~%.:_\-\/'; <<<
 * In the example only these are allowed: A-Za-z 0-9~%.:_-/
 * Please don't edit the expression above if you don't know what are you doing.
 */
$config['url_chars_allowed'] = 'A-Za-z 0-9~%.:_\-\/';

/* Rewrite short tags
 * This lets you rewrite all the short tags in the views if it's not enabled
 * in the php.ini file. NOTE: the parser makes the renderings slower than usual.
 * EXAMPLE:
 *          $config['rewrite_short_tags'] = false; <<<
 */
$config['rewrite_short_tags'] = true;

// End of the file appconfig.php
