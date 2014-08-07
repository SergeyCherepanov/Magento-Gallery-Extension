<?php
/** {license_text}  */
class Open_Gallery_Helper_Data
    extends Mage_Core_Helper_Abstract
{
    protected $_placeHolderUrl;

    /**
     * @param Varien_Object $object
     * @param $attributeCode
     * @param null $width
     * @param null $height
     * @return string
     */
    public function getImageUrl(Varien_Object $object, $attributeCode, $width = null, $height = null)
    {
        return $this->_getImageUrl($object->getData($attributeCode), $width, $height);
    }

    /**
     * @return string
     * @throws Open_Gallery_Exception
     */
    protected function _getPlaceHolderPath()
    {
        if (is_null($this->_placeHolderUrl)) {
            // replace file with skin or default skin placeholder
            $baseDir = Mage::getDesign()->getSkinBaseDir();
            $skinPlaceholder = "/images/catalog/product/placeholder/image.jpg";
            $file = $skinPlaceholder;
            if (file_exists($baseDir . $file)) {
                return $baseDir . $file;
            } else {
                $baseDir = Mage::getDesign()->getSkinBaseDir(array('_theme' => 'default'));
                if (file_exists($baseDir . $file)) {
                    return $baseDir . $file;
                } else {
                    $baseDir = Mage::getDesign()->getSkinBaseDir(array('_theme' => 'default', '_package' => 'base'));
                    if (file_exists($baseDir . $file)) {
                        return $baseDir . $file;
                    }
                }
            }

            throw new Open_Gallery_Exception($this->__('Place holder not found'));
        }

        return $this->_placeHolderUrl;
    }


    /**
     * @param string $imagePath
     * @param int|null $width
     * @param int|null $height
     * @return string
     */
    protected function _getImageUrl($imagePath, $width = null, $height = null)
    {
        $imagePath = trim($imagePath);
        $mediaDir = Mage::getBaseDir('media');
        $cacheDir = implode('/', array('gallery', 'image', 'cache'));
        $path     = $mediaDir . DS . $cacheDir;
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        if (!$imagePath || !is_file($mediaDir . DS . $imagePath)) {
            $imagePath = $this->_getPlaceHolderPath();
        }
        $baseFileName = $imagePath;
        $fileName     = (int) $width . '-' . (int) $height . '-' . basename($baseFileName);
        $filePath     = $path . DS . $fileName;
        if (!is_file($filePath)) {
            $imageAbsPath = $mediaDir . DS . $baseFileName;
            if (!is_file($imageAbsPath)) {
                $imageAbsPath = $this->_getPlaceHolderPath();
            }
            $image = new Varien_Image($imageAbsPath);
            $image->keepAspectRatio(true);
            $image->keepFrame(true);
            $image->constrainOnly(true);
            $image->backgroundColor(array(0,0,0));
            if ($width) {
                $image->resize(intval($width), $height);
            }

            $image->save($path, $fileName);
        }

        return Mage::getBaseUrl('media') . $cacheDir . '/' . $fileName;
    }
}
