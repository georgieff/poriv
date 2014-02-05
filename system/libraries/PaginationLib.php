<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// KatiePHP Pagination class
// Start of PaginationLib.php (KatiePHP) /system/libraries
/* * ************************************************************************ */
Class PaginationLib {

    protected $configData = array();
    protected $configFile = 'pagination.php';

    public function __construct() {
        require BASEURL . 'config' . DS . 'appconfig.php';
        require_once BASEURL . 'config' . DS . $this->configFile;
        $this->configData = $config;
    }

    /*
     * public function setConfig
     * set pagination configuration
     *  parameters:
     *      @pgNewConfigData : array expected
     */

    public function setConfig($pgNewConfigData) {
        $this->configData = array_diff_key($this->configData, $pgNewConfigData) + $pgNewConfigData;
    }

    /*
     * public function _getUriSegment
     * generate the pages
     *  parameters:
     *      @pgNewConfigData : array expected (optional)
     *      @returnString : boolean expected (optional)
     */

    public function generate($pgNewConfigData = array(), $returnString = true) {
        if (!empty($pgNewConfigData)) {
            $this->setConfig($pgNewConfigData);
        }
        //shorten
        $cData = $this->configData;
        if ($cData['total_rows'] <= $cData['per_page']) {
            if (!$returnString) {
                echo '';
            }
            return '';
        }
        $curPage = (int) $this->getUriSegment($this->configData['cur_page_segment']);
        $allPages = ceil($cData['total_rows'] / $cData['per_page']);
        $curPage = ($curPage > $allPages || $curPage < 1) ? 1 : $curPage;
        $cData['all_pages'] = $allPages;
        $cData['cur_page'] = $curPage;
        $this->configData = $cData;
        $string = $this->_genLinks($cData);
        $string = $cData['full_tag_open'] . $string . $cData['full_tag_close'];
        if (!$returnString) {
            echo $string;
        }
        return $string;
    }

    protected function _genLinks($cData) {
        $returnString = '';

        //middle links
        $start = $cData['cur_page'] - $cData['around_range'];
        $start = ($start < 1) ? 1 : $start;
        $stop = $cData['cur_page'] + $cData['around_range'];
        $stop = ($stop > $cData['all_pages']) ? $cData['all_pages'] : $stop;

        for ($i = $start; $i <= $stop; $i++) {
            $returnString .= ' ';
            if ((int) $i === (int) $cData['cur_page']) {
                $returnString .= $cData['cur_tag_open'] . $i . $cData['cur_tag_close'];
            } else {
                $returnString .= "<a href= \"" . $cData['url'] . "/" . $i . "\" " . $cData['digit_attrs'] . ">" . $i . "</a>";
            }
        }
        // first links
        $ftart = 1;
        if ($start > $cData['end_range']) {
            $fstop = $cData['end_range'];
            if ($fstop + 1 != $start) {
                $returnString = ' ... ' . $returnString;
            }
        } else {
            $fstop = $start - 1;
        }
        for ($i = $fstop; $i >= 1; $i--) {
            $returnString = "<a href= \"" . $cData['url'] . "/" . $i . "\" " . $cData['digit_attrs'] . ">" . $i . "</a> " . $returnString;
        }
        if ($cData['cur_page'] - 1) {
            $prevLink = $cData['cur_page'] - 1;
            $returnString = "<a href=\"" . $cData['url'] . "/" . $prevLink . "\" " . $cData['prev_attrs'] . ">" . $cData['prev_link'] . "</a> " . $returnString;
            $returnString = "<a href=\"" . $cData['url'] . "/1\" ". $cData['first_attrs'] . ">" . $cData['first_link'] . "</a> " . $returnString;
        }

        // final links
        $estop = $cData['all_pages'];
        if ($stop > $estop - $cData['end_range']) {
            $estart = $stop + 1;
        } else {
            $estart = $estop - $cData['end_range'] + 1;
            if ($stop + 1 != $estop - $cData['end_range'] + 1) {
                $returnString = $returnString . ' ... ';
            }
        }
        for ($i = $estart; $i <= $estop; $i++) {
            $returnString .= " <a href= \"" . $cData['url'] . "/" . $i . "\" " . $cData['digit_attrs'] . ">" . $i . "</a>";
        }
        if ($cData['cur_page'] != $cData['all_pages']) {
            $nextLink = $cData['cur_page'] + 1;
            $returnString .= " <a href=\"" . $cData['url'] . "/" . $nextLink . "\" " . $cData['next_attrs'] . ">" . $cData['next_link'] . "</a> ";
            $returnString .= " <a href=\"" . $cData['url'] . "/" . $cData['all_pages'] . "\" " . $cData['last_attrs'] . ">" . $cData['last_link'] . "</a> ";
        }

        return $returnString;
    }

    /*
     * public function getUriSegment
     * return the current page using the uri segmentation
     *  parameters:
     *      $uriSegment : integer
     */

    public function getUriSegment($uriSegment) {
        $urlArray = array();
        $fullUrl = rtrim(REQURL, '/');
        $urlArray = explode("/", $fullUrl);
        if (!$urlArray[0]) {
            return 1;
        }
        if (isset($urlArray[$uriSegment - 1])) {
            return (is_numeric($urlArray[$uriSegment - 1]) && $urlArray[$uriSegment - 1] > 0) ? $urlArray[$uriSegment - 1] : 1;
        }
        return 1;
    }

}

// End of the file PaginationLib.php