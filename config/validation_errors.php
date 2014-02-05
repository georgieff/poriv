<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of validation_errors.php (KatiePHP) /config
/* * ************************************************************************ */

/* Set your validation errors
 * EXAMPLE: *          
 *          $error['required'] = "The field %s is required"; <<<
 *  %s symbol will be replaces with the label of the field 
 */

$error['required'] = 'The %s field is required.';
$error['validMail'] = 'The %s field is not valid.';
$error['minLength'] = 'The %s field should be more than %s.';
$error['maxLength'] = 'The %s field should be less than %s символа.';
$error['sameAs'] = 'The %s field is not the same as the %s field.';

// End of the file validation_errors.php