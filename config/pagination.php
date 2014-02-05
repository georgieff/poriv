<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of pagination.php (KatiePHP) /config
/* * ************************************************************************ */

/* Change properties of the generated pages
 * EXAMPLE: *          
 *          $config['full_tag_open'] = '<div>'; <<<
 *          $config['full_tag_close'] = '</div>'; <<<
 *          $config['cur_tag_open'] = ' <a href="#" class="">'; <<<
 *          $config['cur_tag_close'] = '</a>'; <<<
 *          $config['cur_page_segment'] = 4; <<<
 *          $config['per_page'] = 10; <<<
 *          $config['first_link'] = 'First'; <<<
 *          $config['last_link'] = 'Last'; <<<
 *          $config['next_link'] = 'next'; <<<
 *          $config['prev_link'] = 'previous'; <<<
 *          $config['prev_attrs'] = 'class=""'; <<<
 *          $config['next_attrs'] = 'class=""'; <<<
 *          $config['digit_attrs'] = 'class=""'; <<<
 *          $config['end_range'] = 2; <<<
 *          $config['around_range'] = 2; <<<
 */

$config['full_tag_open'] = '<div>';
$config['full_tag_close'] = '</div>';
$config['cur_tag_open'] = '<b><a href="" class="">';
$config['cur_tag_close'] = '</a></b>';
$config['cur_page_segment'] = 3;
$config['per_page'] = 10;
$config['first_link'] = 'First';
$config['last_link'] = 'Last';
$config['next_link'] = 'next';
$config['prev_link'] = 'previous';
$config['prev_attrs'] = 'class=""';
$config['first_attrs'] = 'class=""';
$config['next_attrs'] = 'class=""';
$config['last_attrs'] = 'class=""';
$config['digit_attrs'] = 'class=""';
$config['end_range'] = 3;
$config['around_range'] = 2;


// End of the file pagination.php