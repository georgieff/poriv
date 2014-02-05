<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// KatiePHP Upload class
// Start of UploadLib.php (KatiePHP) /system/libraries
/* * ************************************************************************ */
class UploadLib {

    protected $configData = array();
    protected $configFile = 'upload.php';
    protected $uploadErrors = array();
    protected $uploadedData = array();

    public function __construct() {
        require_once BASEURL . 'config' . DS . $this->configFile;
        $this->configData = $config;
    }

    /*
     * public function setData
     * set upload configuration
     *  parameters:
     *      @uploadConfig : array expected
     */

    public function setData($uploadConfig) {
        $this->configData = array_diff_key($this->configData, $uploadConfig) + $uploadConfig;
    }

    /*
     * public function doUpload
     * do the upload
     *  parameters:
     *      @uploadFile : string expected
     */

    public function doUpload($uploadFile) {
        $uploadErrors = 0;

        // Is $_FILES[$field] set? If not, no reason to continue.
        if (!$this->_checkFile($uploadFile, $uploadErrors)) {
            return false;
        }
        // Is the upload path valid?
        $this->_checkPath($uploadErrors);
        $tempFilePath = $_FILES[$uploadFile]['tmp_name'];
        $tempFileName = $_FILES[$uploadFile]['name'];
        //get the file extension
        $fileExtension = '.' . preg_replace('/^.*\.([^.]+)$/D', '$1', $tempFileName);

        list($tempImageWidth, $tempImageHeight, $tempFileType ) = getimagesize($tempFilePath);
        //check if its image
        if ($tempFileType === NULL) {
            $uploadErrors++;
            $this->uploadErrors[] = 'Unrecognised file type!<br>';
        }
        //check the file type
        $this->_checkType($tempFileType, $uploadErrors);
        //check size, with and height
        $this->_checkHeight($tempImageHeight, $uploadErrors);
        $this->_checkWidth($tempImageWidth, $uploadErrors);
        $this->_checkSize($tempFilePath, $uploadErrors);
        //set the name of the file
        $newFileName = $this->_setFileName($tempFileName, $fileExtension);

        $uploadedImagePath = $this->configData['upload_path'] . '/' . $newFileName;
        if ($uploadErrors === 0) {
            $this->uploadedData['file_temp'] = $_FILES[$uploadFile]['tmp_name'];
            $this->uploadedData['file_size'] = $_FILES[$uploadFile]['size'];
            $this->uploadedData['file_type'] = preg_replace("/^(.+?);.*$/", "\\1", $_FILES[$uploadFile]['type']);
            $this->uploadedData['file_type'] = strtolower(trim(stripslashes($this->uploadedData['file_type']), '"'));
            $this->uploadedData['file_name'] = $newFileName;
            $this->uploadedData['raw_name'] = substr($newFileName, 0, strrpos($newFileName, '.'));
            $this->uploadedData['file_ext'] = $fileExtension;
            $this->uploadedData['file_path'] = $this->configData['upload_path'] . '/';
            $this->uploadedData['full_path'] = $uploadedImagePath;
            return move_uploaded_file($tempFilePath, $uploadedImagePath);
        } else {
            return false;
        }
    }

    /*
     * public function data
     * return information about the last upload
     */

    public function data() {
        return $this->uploadedData;
    }

    /*
     * public function getErrors
     * return information about the last upload
     */

    public function getErrors() {
        return $this->uploadErrors;
    }

    /*
     * protected function _setFileName
     * set the name of the new file
     *  parameters:
     *      @defaultName : string expected
     *      @defaultExtension : string expected
     */

    protected function _setFileName($defaultName, $defaultExtension) {
        $newFileName = $defaultName;
        if ($this->configData['encrypt_name'] === true) {
            $newFileName = sha1(microtime()) . $defaultExtension;
        } elseif ($this->configData['new_file_name']) {
            $newFileName = $this->configData['new_file_name'] . $defaultExtension;
        }
        return $newFileName;
    }

    /*
     * protected function _checkWidth
     * check the width
     *  parameters:
     *      @tempImageWidth : integer expected
     *      @uploadErrors : integer expected
     */

    protected function _checkWidth($tempImageWidth, & $uploadErrors) {
        if ($this->configData['max_width'] > 0 && $tempImageWidth > $this->configData['max_width']) {
            $uploadErrors++;
            $this->uploadErrors[] = 'The width is above the maximum!<br>';
        }
    }

    /*
     * protected function _checkHeight
     * check the height
     *  parameters:
     *      @tempImageHeight : integer expected
     *      @uploadErrors : integer expected
     */

    protected function _checkHeight($tempImageHeight, & $uploadErrors) {
        if ($this->configData['max_height'] > 0 && $tempImageHeight > $this->configData['max_height']) {
            $uploadErrors++;
            $this->uploadErrors[] = 'The height is above the maximum!<br>';
        }
    }

    /*
     * protected function _checkSize
     * check the size of the fize
     *  parameters:
     *      @tempFilePath : string expected
     *      @uploadErrors : integer expected
     */

    protected function _checkSize($tempFilePath, & $uploadErrors) {
        if ($this->configData['max_size'] > 0 && rount(filesize($tempFilePath) / 1024, 2) > $this->configData['max_size']) {
            $uploadErrors++;
            $this->uploadErrors[] = 'The file is bigger than expected!<br>';
        }
    }

    /*
     * protected function _checkFile
     * check if the uploadfile is set
     *  parameters:
     *      @uploadFile : string expected
     *      @uploadErrors : integer expected
     */

    protected function _checkFile($uploadFile, & $uploadErrors) {
        if (!isset($_FILES[$uploadFile])) {
            $uploadErrors++;
            $this->uploadErrors[] = 'No upload file is set!<br>';
            return false;
        }
        return true;
    }

    /*
     * protected function _checkPath
     * check the path of a file
     *  parameters:
     *      @uploadErrors : integer expected
     */

    protected function _checkPath(& $uploadErrors) {
        if (!is_dir($this->configData['upload_path'])) {
            $uploadErrors++;
            $this->uploadErrors[] = 'Upload path is not valid directory!<br>';
        }
    }

    /*
     * protected function _checkType
     * check the type of the file
     *  parameters:
     *      @tempFileType : IMAGETYPE_XXX expected
     *      @uploadErrors : integer expected
     */

    protected function _checkType($tempFileType, & $uploadErrors) {
        switch ($tempFileType) {
            case IMAGETYPE_GIF:
                if (strpos($this->configData['allowed_types'], 'gif') === false) {
                    $uploadErrors++;
                    $this->uploadErrors[] = 'Bad file type!<br>';
                }
                break;

            case IMAGETYPE_JPEG:
                if (strpos($this->configData['allowed_types'], 'jpeg') !== false || strpos($this->configData['allowed_types'], 'jpg') !== false) {
                    break;
                }
                $uploadErrors++;
                $this->uploadErrors[] = 'Bad file type!<br>';
                break;

            case IMAGETYPE_PNG:
                if (strpos($this->configData['allowed_types'], 'png') === false) {
                    $uploadErrors++;
                    $this->uploadErrors[] = 'Bad file type!<br>';
                }
                break;

            default:
                $uploadErrors++;
                $this->uploadErrors[] = 'Unrecognised file type!<br>';
                return false;
        }
    }

}

// End of the file UploadLib.php