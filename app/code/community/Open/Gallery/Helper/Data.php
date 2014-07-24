<?php
/** {license_text}  */
class Open_Gallery_Helper_Data
    extends Mage_Core_Helper_Abstract
{
    /**
     * @return int
     */
    public function getDataMaxSize()
    {
        return min($this->getPostMaxSize(), $this->getUploadMaxSize());
    }

    /**
     * @return string
     */
    public function getPostMaxSize()
    {
        return ini_get('post_max_size');
    }

    /**
     * @return string
     */
    public function getUploadMaxSize()
    {
        return ini_get('upload_max_filesize');
    }
}
