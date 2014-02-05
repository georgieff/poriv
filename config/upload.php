<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of upload.php (KatiePHP) /config
/* * ************************************************************************ */

/* Change properties of the upload rules
 * EXAMPLE: *          
 *          $config['upload_path'] = ''; <<<
 *          $config['allowed_types'] = 'gif|jpg|png'; <<<
 *          $config['encrypt_name'] = true; <<<
 *          $config['new_file_name'] = ''; <<<
 *          $config['max_width'] = 0; <<<
 *          $config['max_height'] = 0; <<<
 *          $config['max_size'] = 0; // in KiB <<<
 */

$config['upload_path'] = '';
$config['allowed_types'] = 'gif|jpg|png';
$config['encrypt_name'] = true;
$config['new_file_name'] = '';
$config['max_width'] = 0;
$config['max_height'] = 0;
$config['max_size'] = 0; // in KiB


// End of the file upload.php