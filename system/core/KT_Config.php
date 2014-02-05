<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of KT_Config.php (KatiePHP) /system/core
/* * ************************************************************************ */
class KT_Config {

    private static $instance;
    protected $configFile = 'appconfig.php';
    protected $configData = array();

    public function __construct() {
        require BASEURL . 'config' . DS . $this->configFile;
        $this->configData = $config;
    }

    /*
     * public function getConfigData
     * return data from the application config file
     *  parameters:
     *      @key : string expected (optional)
     */

    public function getConfigData($key = '') {
        if ($key) {
            return (isset($this->configData[$key])) ? $this->configData[$key] : false;
        } else {
            return $this->configData;
        }
    }

    /*
     * public function slashItem
     * trim the config data 
     *  parameters:
     *      @key : string expected
     */

    public function slashItem($key) {
        if (!isset($this->configData[$key])) {
            return FALSE;
        }
        if (trim($this->configData[$key]) == '') {
            return '';
        }

        return rtrim($this->configData[$key], '/') . '/';
    }

    /*
     * public function siteURL
     * create url adding it the base url
     *  parameters:
     *      @uri : string expected (optional)
     */

    public function siteURL($uri = '') {
        return $this->slashItem('base_url') . $this->_uriString($uri);
    }

    /*
     * protected function _uriString
     * adds "/" to a string
     *  parameters:
     *      @uri : string expected 
     */

    protected function _uriString($uri) {
        $uri = trim($uri, '/');
        return $uri;
    }

    public static function &get_instance() {
        return self::$instance;
    }

}

// End of the file KT_Config.php