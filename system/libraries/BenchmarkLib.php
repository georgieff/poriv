<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// KatiePHP Benchmark class
// Start of BenchmarkLib.php (KatiePHP) /system/libraries
/* * ************************************************************************ */
Class BenchmarkLib {

    protected $allPoints = array();

    /*
     * public function setMark
     * set check mark
     *  parameters:
     *      @markName : string expected
     */

    public function setMark($markName) {
        $this->allPoints[$markName] = microtime(true);
    }

    /*
     * public function getElapsedTime
     * get the elapsed time between 2 marks
     *  parameters:
     *      @firstMarkName : string expected
     *      @secondMarkName : string expected (optional)
     */

    public function getElapsedTime($firstMarkName, $secondMarkName = '') {
        if ($secondMarkName === '') {
            return number_format(microtime(true) - $this->allPoints[$firstMarkName], 3);
        } else {
            return number_format($this->allPoints[$secondMarkName] - $this->allPoints[$firstMarkName], 3);
        }
    }

}

// End of the file BenchmarkLib.php