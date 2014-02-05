<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// KatiePHP Image class
// Start of ImageLib.php (KatiePHP) /system/libraries
/* * ************************************************************************ */
class ImageLib {

    protected $configData = array();

    /*
     * public function setData
     * set image library configuration
     *  parameters:
     *      @data : array expected
     */

    public function setData($data) {
        $this->configData = array_diff_key($this->configData, $data) + $data;
    }

    /*
     * public function resize
     * resize the image
     */

    public function resize() {
        $sourceImagePath = $this->configData['source_image'];
        $sourceIimagePath = $this->configData['new_name'];
        $thumbnailImageWidth = $this->configData['width'];
        $thumbnailImageHeight = $this->configData['height'];

        list( $sourceImageWidth, $sourceImageHeight, $sourceImageType ) = getimagesize($sourceImagePath);

        switch ($sourceImageType) {
            case IMAGETYPE_GIF:
                $sourceImage = imagecreatefromgif($sourceImagePath);
                break;

            case IMAGETYPE_JPEG:
                $sourceImage = imagecreatefromjpeg($sourceImagePath);
                break;

            case IMAGETYPE_PNG:
                $sourceImage = imagecreatefrompng($sourceImagePath);
                break;
        }

        if ($sourceImage === false) {
            return false;
        }

        if ($this->configData['maintain_ratio']) {
            if ($sourceImageWidth > $thumbnailImageWidth || $sourceImageHeight > $thumbnailImageHeight) {
                $sourceAspectRatio = $sourceImageWidth / $sourceImageHeight;
                $thumbnailAspectRatio = $thumbnailImageWidth / $thumbnailImageHeight;

                if ($sourceImageWidth <= $thumbnailImageWidth && $sourceImageHeight <= $thumbnailImageHeight) {
                    $thumbnailImageWidth = $sourceImageWidth;
                    $thumbnailImageHeight = $sourceImageHeight;
                } elseif ($thumbnailAspectRatio > $sourceAspectRatio) {
                    $thumbnailImageWidth = (int) ( $thumbnailImageHeight * $sourceAspectRatio );
                } else {
                    $thumbnailImageHeight = (int) ( $thumbnailImageWidth / $sourceAspectRatio );
                }
            } else{
                $thumbnailImageWidth = $sourceImageWidth;
                $thumbnailImageHeight = $sourceImageHeight;
            }
        }

        $thumbnailImage = imagecreatetruecolor($thumbnailImageWidth, $thumbnailImageHeight);

        imagecopyresampled($thumbnailImage, $sourceImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $sourceImageWidth, $sourceImageHeight);
        imagejpeg($thumbnailImage, $sourceIimagePath, 90);
        imagedestroy($sourceImage);
        imagedestroy($thumbnailImage);
        return true;
    }

}

// End of the file ImageLib.php