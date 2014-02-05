<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of validation.php (KatiePHP) /config
/* * ************************************************************************ */

/* set validation rules */
$config['validate'] = array(
    'log' => array(
        array(
            'caption' => 'Име',
            'name' => 'username',
            'rules' => 'required|minLength(2)|maxLength(5)|htmlspecialchars'
        ),
        array(
            'caption' => 'Парола',
            'name' => 'password',
            'rules' => 'trim|required|minLength(2)|maxLength(5)|htmlspecialchars'
        )
    )
);

// End of the file validation.php