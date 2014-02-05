<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// KatiePHP Validation class
// Start of ValidationLib.php (KatiePHP) /system/libraries
/* * ************************************************************************ */
Class ValidationLib {

    protected $configData = array();
    protected $configFile = 'validation.php';
    protected $errorData = array();
    protected $errorFile = 'validation_errors.php';
    protected $errorsArray = array();
    protected $vFields = array();
    protected $KT;
    //validation errors
    protected $vErrors = 0;

    public function __construct() {
        require_once BASEURL . 'config' . DS . $this->configFile;
        $this->configData = $config['validate'];
        require_once BASEURL . 'config' . DS . $this->errorFile;
        $this->errorData = $error;
        //get super object instance for adding data to the views
        $this->KT = & KT_Controllers::get_instance();
    }

    /*
     * public function validate
     * validate the input data
     *  parameters:
     *      @vType : string expected
     */

    public function validate($vType) {
        $postData = $this->KT->input->post();
        $this->vErrors = 0;
        if (!empty($postData)) {
            $this->vFields = $this->configData[$vType];
            foreach ($this->vFields as $vField) {
                $rulesArray = explode('|', $vField['rules']);
                if (isset($postData[$vField['name']])) {
                    foreach ($rulesArray as $rule) {
                        $value = $this->KT->input->post($vField['name']);
                        $this->KT->input->setPost($vField['name'], $this->_checkValue($value, $rule, $vType, $vField['caption']));
                    }
                    if (!$this->KT->input->post($vField['name']) & in_array('required', $rulesArray)) {
                        $this->vErrors++;
                        $errorMessage = sprintf($this->errorData['required'], $vField['caption']);
                        $this->addError($vType, $errorMessage);
                    }
                } else {
                    if (in_array('required', $rulesArray)) {
                        $this->vErrors++;
                        $errorMessage = sprintf($this->errorData['required'], $vField['caption']);
                        $this->addError($vType, $errorMessage);
                    }
                }
            }
            return ($this->vErrors) ? false : true;
        }
        return false;
    }

    /*
     * protected function _checkValue
     * test given value
     *  parameters:
     *      @value : string expected
     *      @test : string expected
     *      @errorCount : integer expected
     */

    protected function _checkValue($value, $test, $vType, $label) {
        if (is_callable($test) && trim($value)) {
            $value = $test($value);
        } elseif (trim($value)) {
            $function = explode("(", $test);
            $test = $function[0];
            if (method_exists('ValidationLib', $test)) {
                //check if the rule needs a parameter
                if (isset($function[1])) {
                    $function[1] = substr($function[1], 0, -1);
                    if (!$this->$test($value, $function[1])) {
                        $this->vErrors++;
                        //if the parameter is string then it means that it's a key
                        if (is_string($function[1])) {
                            $function[1] = $this->_getCaption($function[1]);
                        }
                        $errorMessage = sprintf($this->errorData[$test], $label, $function[1]);
                        $this->addError($vType, $errorMessage);
                    }
                } else {
                    if (!$this->$test($value)) {
                        $this->vErrors++;
                        $errorMessage = sprintf($this->errorData[$test], $label);
                        $this->addError($vType, $errorMessage);
                    }
                }
            }
        }
        return $value;
    }

    /*
     * protected function _getCaption
     * get caption of a field
     *  parameters:
     *      @fieldName : string expected
     */

    protected function _getCaption($fieldName) {
        foreach ($this->vFields as $vField) {
            if ($vField['name'] == $fieldName) {
                return $vField['caption'];
            }
        }
        return $fieldName;
    }

    /*
     * public function addError
     * add eroor to the error array
     *  parameters:
     *      @vKey : string expected
     *      @vMessage : string expected
     */

    public function addError($vKey, $vMessage) {
        $this->errorsArray[$vKey][] = $vMessage;
    }

    /*
     * public function getErrors
     * get all the validation errors
     *  parameters:
     *      @vKey : string expected
     *      @vMessage : string expected
     */

    public function getErrors($vKey) {
        $returnString = '';
        if (!isset($this->errorsArray[$vKey])) {
            $this->errorsArray[$vKey] = array();
        }
        foreach ($this->errorsArray[$vKey] as $vError) {
            $returnString .= $vError . '<br>';
        }
        return $returnString;
    }

    /*
     * public function validMail
     * validates email address
     *  parameters:
     *      @email : string expected
     */

    public function validMail($email) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? false : true;
    }

    /*
     * public function minLength
     * check if the length is under given value
     *  parameters:
     *      @string : string expected
     *      @length : int expected
     */

    public function minLength($string, $length) {
        return (strlen(trim($string)) < (int) $length) ? false : true;
    }

    /*
     * public function maxLength
     * check if the length is above given value
     *  parameters:
     *      @string : string expected
     *      @length : int expected
     */

    public function maxLength($string, $length) {
        return (strlen(trim($string)) > (int) $length) ? false : true;
    }

    /*
     * public function sameAs
     * check if value is same as given key of the post data
     *  parameters:
     *      @string : string expected
     *      @key : string expected
     */

    public function sameAs($string, $key) {
        $value = $this->KT->input->post($key);
        return (trim($string) != trim($value)) ? false : true;
    }

}

// End of the file ValidationLib.php