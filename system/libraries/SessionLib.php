<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// KatiePHP Session class
// Start of SessionLib.php (KatiePHP) /system/libraries
/* * ************************************************************************ */
Class SessionLib {

    protected $tempData = array();

    public function __construct() {
        session_start();
        //set default temp_data as an ampty array
        if (!isset($_SESSION['temp_data'])) {
            $_SESSION['temp_data'] = array();
        }
        //update
        $this->tempData = $_SESSION['temp_data'];
        for ($i = 0; $i < count($this->tempData); $i++) {
            //if the ttl is 0 set the data as an empty string
            if ($this->tempData[$i]['ttl'] == 0) {
                $this->tempData[$i]['data'] = '';
            }
            // -1 ttl
            $this->tempData[$i]['ttl']--;
        }
    }

    public function __destruct() {
        // add the data to the session
        $_SESSION['temp_data'] = $this->tempData;
    }

    /*
     * public function get
     * get session data
     *  parameters:
     *      @sessKey : string expected  
     */

    public function get($sessKey) {
        if (isset($_SESSION[$sessKey])) {
            return $_SESSION[$sessKey];
        } else {
            return false;
        }
    }

    /*
     * public function set
     * set a new session
     *  parameters:
     *      @sessKey : string expected 
     *      @sessData : data(any) expected 
     */

    public function set($sessKey, $sessData) {
        if ($sessKey == 'temp_data') {
            return false;
        }
        $_SESSION[$sessKey] = $sessData;
        return true;
    }

    /*
     * public function setTempData
     * set a new session
     *  parameters:
     *      @tempKey : string expected 
     *      @tempData : data(any) expected 
     *      @tempTTL : integer expected (optional
     */

    public function setTempData($tempKey, $tempData, $tempTTL = 1) {
        $newData['key'] = $tempKey;
        $newData['data'] = $tempData;
        $newData['ttl'] = $tempTTL;
        for ($i = 0; $i < count($this->tempData); $i++) {
            if ($this->tempData[$i]['key'] == $tempKey) {
                $this->tempData[$i]['data'] = $tempData;
                $this->tempData[$i]['ttl'] = $tempTTL;
                return true;
            }
        }
        $this->tempData[] = $newData;
        return true;
    }

    /*
     * public function getTempData
     * get a tempdata
     *  parameters:
     *      @tempKey : string expected 
     */

    public function getTempData($tempKey) {
        foreach ($this->tempData as $tempData) {
            if ($tempData['key'] === $tempKey) {
                return $tempData['data'];
            }
        }
        return '';
    }

    /*
     * public function unset
     * unset the session
     */

    public function unsetData($sessKey) {
        unset($_SESSION[$sessKey]);
    }

    /*
     * public function getID
     * destroy the session
     */

    public function getID() {
        return session_id();
    }

    /*
     * public function destroy
     * destroy the session
     */

    public function destroy() {
        session_destroy();
    }

}

// End of the file SessionLib.php