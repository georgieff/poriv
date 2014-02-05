<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// Start of KT_Loader.php (KatiePHP) /system/core
/* * ************************************************************************ */
class KT_Loader {

    //store the loaded models, libraries(classes) and helpers
    protected $loadedModels = array();
    protected $loadedLibs = array();
    protected $loadedHelpers = array();
    //set libraries that shoud be loaded by default in the system
    protected $autoloadLibs = array('input');
    //declare  super object instance
    protected $KT;
    //user defined prefix
    protected $px;

    public function __construct($instance = '') {

        if (!$instance) {
            //load  super object instance
            $this->KT = & KT_Controllers::get_instance();
        } else {
            //load specified object instance
            $this->KT = $instance;
        }

        //get the config files content
        global $config;
        //set the user defined prefix for overriden classes
        $this->px = $config['subclass_prefix'];
        //first load the system classes
        foreach ($this->autoloadLibs as $libraryName) {
            $this->library($libraryName);
        }
        //load the user defined autoload classes
        foreach ($config['helpers'] as $helperName) {
            $this->helper($helperName);
        }
        foreach ($config['libraries'] as $libraryName) {
            $this->library($libraryName);
        }
        foreach ($config['models'] as $modelName) {
            $this->model($modelName);
        }
        //print_r($config);
    }

    /*
     * public function model
     * load model class
     *  parameters:
     *      @modelName : string expected
     */

    public function model($modelName) {
        $modelName = ucfirst(strtolower($modelName));
        if (!in_array($modelName, $this->loadedModels)) {
            $path = APPURL . 'models' . DS . $modelName . 'Model.php';

            if (file_exists($path)) {
                require_once $path;
                $this->_loadClass($modelName, 'Model');
                array_push($this->loadedModels, strtolower($modelName));
            } else {
                exit('404 Model "' . $modelName . '" not found');
            }
        }
    }

    /*
     * public function library
     * load library class
     *  parameters:
     *      @libraryName : string expected
     */

    public function library($libraryName) {
        $libraryName = ucfirst(strtolower($libraryName));
        if (!in_array($libraryName, $this->loadedLibs)) {
            $path = SYSURL . 'libraries' . DS . $libraryName . 'Lib.php';
            $oPath = APPURL . 'libraries' . DS . $this->px . $libraryName . 'Lib.php';
            // check if there is a overriden class
            if (file_exists($oPath)) {
                if (file_exists($path)) {
                    require_once $path;
                }
                require_once $oPath;
                $this->_loadClass($libraryName, 'Lib', true);
                array_push($this->loadedLibs, strtolower($libraryName));
            } elseif (file_exists($path)) {
                require_once $path;
                $this->_loadClass($libraryName, 'Lib');
                array_push($this->loadedLibs, strtolower($libraryName));
            } else {
                exit('404 library "' . $libraryName . '" not found');
            }
        }
    }

    /*
     * public function helper
     * load helper class
     *  parameters:
     *      @helperName : string expected
     */

    public function helper($helperName) {
        $helperName = ucfirst(strtolower($helperName));
        if (!in_array($helperName, $this->loadedHelpers)) {
            $path = SYSURL . 'helpers' . DS . $helperName . 'Helper.php';
            $oPath = APPURL . 'helpers' . DS . $this->px . $helperName . 'Helper.php';
            // check if there is a overriden class
            if (file_exists($oPath)) {
                require_once $oPath;
                if (file_exists($path)) {
                    require_once $path;
                }
                array_push($this->loadedHelpers, strtolower($helperName));
            } elseif (file_exists($path)) {
                require_once $path;
                array_push($this->loadedHelpers, strtolower($helperName));
            } else {
                exit('404 helper "' . $helperName . '" not found');
            }
        }
    }

    /*
     * protected function _loadClass
     * call all needed classes
     *  parameters:
     *      @className : string expected
     *      @classType : string expected (optional)
     *      @usePrefix : boolean expected (optional)
     */

    protected function _loadClass($className, $classType = '', $usePrefix = false) {
        $fullClassName = ($usePrefix) ? $this->px : '';
        $fullClassName .= $className . $classType;
        $property = strtolower($className);
        $this->KT->$property = new $fullClassName();
    }

    /*
     * public function isLoaded
     * check if class is included
     *  parameters:
     *      @className : string expected
     */

    public function isLoaded($className) {
        if (in_array($className, $this->loadedModels)) {
            return true;
        } elseif (in_array($className, $this->loadedLibs)) {
            return true;
        } elseif (in_array($className, $this->loadedHelpers)) {
            return true;
        }
        return false;
    }

}

// End of the file KT_Loader.php