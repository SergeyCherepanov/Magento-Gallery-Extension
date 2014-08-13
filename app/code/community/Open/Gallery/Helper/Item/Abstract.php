<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

abstract class Open_Gallery_Helper_Item_Abstract
    extends Open_Gallery_Helper_Data
    implements Open_Gallery_Helper_Item_Interface
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

    /**
     * @param Open_Gallery_Model_Item $item
     * @param array $scripts
     * @return array
     */
    public function prepareEditFormScripts(Open_Gallery_Model_Item $item, array $scripts)
    {
        return $scripts;
    }

    /**
     * @param Open_Gallery_Model_Item $item
     * @param Mage_Adminhtml_Controller_Action $controller
     * @return $this|Open_Gallery_Helper_Item_Interface
     * @throws Exception
     * @throws Mage_Core_Exception
     * @throws Open_Gallery_Exception
     */
    public function prepareItemSave(Open_Gallery_Model_Item $item, Mage_Adminhtml_Controller_Action $controller)
    {
        $data = $controller->getRequest()->getPost('item');
        if (isset($data['thumbnail'], $data['thumbnail']['delete']) && !empty($data['thumbnail']['delete'])) {
            $item->deleteThumbnail();
            $item->setData('thumbnail', '');
        } else if (
            isset($_FILES['item']['tmp_name']['thumbnail'])
            && $_FILES['item']['tmp_name']['thumbnail']
        ) {
            try {
                $savedFilePath = $this->_saveFile('item[thumbnail]', array('jpg', 'jpeg', 'png', 'gif'), 'thumbnail');
                $item->setData('thumbnail', $savedFilePath);
            } catch (Mage_Core_Exception $e) {
                throw $e;
            } catch (Exception $e) {
                Mage::logException($e);
                throw new Open_Gallery_Exception($this->__("Can't save thumbnail."));
            }
        }

        unset($data['thumbnail'], $data['value']);

        $item->addData($data);

        return $this;
    }

    /**
     * @param string $paramName
     * @param array|null $allowedFormats
     * @param string|null $subDir
     * @return string
     */
    protected function _saveFile($paramName, $allowedFormats = null, $subDir = null)
    {
        $localPath = 'gallery' . DS . 'data' . DS;
        if ($subDir) {
            $localPath .= $subDir . DS;
        }
        $absPath   = Mage::getBaseDir('media') . DS . $localPath;
        if (!is_dir($absPath)) {
            mkdir($absPath, 0755, true);
        }
        $uploader = new Mage_Core_Model_File_Uploader($paramName);
        if (is_array($allowedFormats)) {
            $uploader->setAllowedExtensions($allowedFormats);
        }
        $uploader->setAllowRenameFiles(true);
        $result = $uploader->save($absPath);

        return $localPath . $result['file'];
    }

    /**
     * @param Open_Gallery_Model_Item $item
     * @param Mage_Core_Controller_Varien_Action $controller
     * @return Open_Gallery_Helper_Item_Interface|void
     */
    public function prepareAndRenderView(Open_Gallery_Model_Item $item, Mage_Core_Controller_Varien_Action $controller)
    {
        $controller->loadLayout(
            array ('default', strtolower($controller->getFullActionName() . '_' . $item->getData('type')))
        );
        $controller->renderLayout();

        return $this;
    }
}
