<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of KT_Views.php (KatiePHP) /system/core
/* * ************************************************************************ */
class KT_Views {

    protected $viewData = Array();
    protected $view;
    protected $configData = Array();
    protected $configFile = 'appconfig.php';

    public function __construct() {
        $this->view = & $this;
        require BASEURL . 'config' . DS . $this->configFile;
        $this->configData = $config;
    }

    /*
     * public function show
     * load view file
     *  parameters:
     *      @viewName : string expected
     *      @viewData : associative array expected (optional)
     */

    public function show($viewName, $viewData='') {
        if (is_array($viewData)) {
            $this->addData($viewData);
        }

        // load variables
        foreach ($this->viewData as $varName => $varVal) {
            $$varName = $varVal;
        }

        // if we have validation errors decrare this function
        if (!function_exists('validationErrors')) {

            function validationErrors($vType) {
                $KT = & KT_Controllers::get_instance();
                if ($KT->load->isLoaded('validation')) {
                    return $KT->validation->getErrors($vType);
                } else {
                    return '';
                }
            }

        }

        // show view or views
        if (!is_array($viewName)) {
            $viewNames[] = $viewName;
        } else {
            $viewNames = $viewName;
        }
        foreach ($viewNames as $viewName) {
            $vPath = APPURL . 'views' . DS . $viewName . '.php';
            if (file_exists($vPath)) {
                if ((bool) @ini_get('short_open_tag') === FALSE AND $this->configData['rewrite_short_tags'] == true) {
                    echo eval('?>' . preg_replace("/;*\s*\?>/", "; ?>", str_replace('<?=', '<?php echo ', file_get_contents($vPath))));
                } else {
                    include $vPath;
                }
            } else {
                //fail
                exit('View : ' . $viewName . ' not found!');
            }
        }
    }

    /*
     * public function get
     * get view file content and return it to a variable
     *  parameters:
     *      @viewName : string expected
     *      @viewData : associative array expected (optional)
     */

    public function get($viewName, $viewData='') {
        ob_start();
        $this->show($viewName, $viewData);
        $viewContent = ob_get_contents();
        ob_end_clean();
        return $viewContent;
    }

    /*
     * public function addData
     * add variables to the view
     *  parameters:
     *      @viewData : associative array expected
     */

    public function addData($viewData) {
        $this->viewData = array_merge($this->viewData, $viewData);
    }

    /*
     * public function clearData
     * clear the view data
     */

    public function clearData() {
        $this->viewData = array();
    }

    public function __get($key) {
        $KT = & KT_Controllers::get_instance();
        return $KT->$key;
    }

}

// End of the file KT_Views.php