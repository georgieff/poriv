<?php
if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of KT_Exceptions.php (KatiePHP) /system/core
/* * ************************************************************************ */

/*
 * function katieErrorHandler
 * creates error box
 *  parameters:
 *      @errNO : string expected
 *      @errStr : string expected
 *      @errFile : string expected
 *      @errLine : string expected
 */

if (!function_exists('katieErrorHandler')) {

    function katieErrorHandler($errNO, $errStr, $errFile, $errLine) {

        if (!(error_reporting() & $errNO)) {
            // This error code is not included in error_reporting
            return;
        }
        switch ($errNO) {
            case E_ERROR:
                $errType = 'Fatal error';
                break;

            case E_USER_WARNING:
                $errType = 'Warning';
                break;

            case E_USER_NOTICE:
                $errType = 'Notice';
                break;

            default:
                $errType = 'Unknown error';
                break;
        }
        ?>
        <div style="width: 90%; border: 1px solid #211F20; background: #F0EDEE; margin: 5px auto; color: #211F20; padding: 5px;">
            Error type : <b><?php echo $errType; ?></b><br>
            Error code : <b><?php echo $errNO; ?></b><br>
            Error message : <b><?php echo $errStr; ?></b><br>
            Error file : <b><?php echo $errFile; ?></b><br>
            Error line : <b><?php echo $errLine; ?></b><br>
        </div>
        <?php
        if ($errType === 'Fatal error') {
            exit;
        }
        // don't display phpinternal error handler
        return true;
    }

    set_error_handler('katieErrorHandler');
}

if (!function_exists('katieErrorShutdownHandler')) {

    /*
     * function katieErrorShutdownHandler
     * creates error box for fatal error
     */

    function katieErrorShutdownHandler() {
        $last_error = error_get_last();
        if ($last_error['type'] === E_ERROR) {
            // fatal error
            katieErrorHandler(E_ERROR, $last_error['message'], $last_error['file'], $last_error['line']);
        }
    }

    register_shutdown_function('katieErrorShutdownHandler');
}

// End of the file KT_Exceptions.php