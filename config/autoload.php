<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of autoload.php (KatiePHP) /config
/* * ************************************************************************ */
/* Change autoload models
 * These models will be loaded automatically when you start your application.
 * EXAMPLE: *
 *          $config['models'] = array('NewsModel', 'PostsModel'); <<<
 */
$config['models'] = array();

/* Change autoload libraries
 * These libraries will be loaded automatically when you start your application.
 * EXAMPLE: *
 *          $config['libraries'] = array('pagination', 'database'); <<<
 */
$config['libraries'] = array('session');

/* Change autoload helpers
 * These helpers will be loaded automatically when you start your application.
 * EXAMPLE: *
 *          $config['helpers'] = array('html', 'form'); <<<
 */
$config['helpers'] = array('url', 'html', 'text');

// End of the file autoload.php
