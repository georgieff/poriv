<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// KatiePHP Input class
// Start of InputLib.php (KatiePHP) /system/libraries
/* * ************************************************************************ */
Class InputLib {
    /*
     * public function post
     * return post data
     *  parameters:
     *      @postKey : string expected (optional)
     */

    public function post($postKey = '') {
        if ($postKey) {
            if (isset($_POST[$postKey])) {
                return $_POST[$postKey];
            } else {
                return false;
            }
        } else {
            return $_POST;
        }
    }

    /*
     * public function setPost
     * set post data
     *  parameters:
     *      @postKey : string expected
     *      @postValue : data(any) expected
     */

    public function setPost($postKey, $postValue) {
        $_POST[$postKey] = $postValue;
    }

    /*
     * public function unsetPost
     * unset post data
     *  parameters:
     *      @postKey : string expected
     */

    public function unsetPost($postKey) {
        $_POST[$postKey] = '';
    }

    /*
     * public function cookie
     * return cookie data
     *  parameters:
     *      @cookieKey : string expected (optional)
     */

    public function cookie($cookieKey = '') {
        if ($cookieKey) {
            return (isset($_COOKIE[$cookieKey])) ? $_COOKIE[$cookieKey] : false;
        } else {
            return $_COOKIE;
        }
    }

    /*
     * public function setCookie
     * set cookie for the user
     *  parameters:
     *      @cookieName : string expected or array with all of the rest data
     *      @cookieValue : string expected (optional)
     *      @cookieExpire : unix timestamp expected (optional)
     */

    public function setCookie($cookieName, $cookieValue = '', $cookieExpire = 0) {
        if (is_array($cookieName)) {
            $cookieName['name'] = (isset($cookieName['name'])) ? $cookieName['name'] : '';
            $cookieName['value'] = (isset($cookieName['value'])) ? $cookieName['value'] : '';
            $cookieName['expire'] = (isset($cookieName['expire'])) ? $cookieName['expire'] : 0;
            $cookieName['path'] = (isset($cookieName['path'])) ? $cookieName['path'] : '';
            $cookieName['domain'] = (isset($cookieName['domain'])) ? $cookieName['domain'] : '';
            $cookieName['secure'] = (isset($cookieName['secure'])) ? $cookieName['secure'] : false;
            $cookieName['httponly'] = (isset($cookieName['httponly'])) ? $cookieName['httponly'] : false;
            return setcookie($cookieName['name'], $cookieName['value'], $cookieName['expire'], $cookieName['path'], $cookieName['domain'], $cookieName['secure'], $cookieName['httponly']);
        } else {
            return setcookie($cookieName, $cookieValue, $cookieExpire);
        }
    }

    /*
     * public function unsetCookie
     * unset cookie
     *  parameters:
     *      @cookieName : string expected
     */

    public function unsetCookie($cookieName) {
        return setcookie($cookieName, "", time() - 3600);
    }

    /*
     * public function getClientIP
     * return the ip address of the current user
     */

    public function getClientIP() {
        if (isset($_SERVER["REMOTE_ADDR"])) {
            return $_SERVER["REMOTE_ADDR"];
        } else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        return false;
    }

    /*
     * public function getUserAgent
     * return the User Agent
     */

    public function getUserAgent() {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    /*
     * public function getDomainName
     * return the Domain Name
     */

    public function getDomainName() {
        return $_SERVER['HTTP_HOST'];
    }

    /*
     * public function isAjax
     * determine if the request is ajax or regular
     */

    public function isAjax() {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        } else {
            return false;
        }
    }

    /*
     * public function requestMethod
     * determine what type is the request
     */

    public function requestMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

}

// End of the file InputLib.php