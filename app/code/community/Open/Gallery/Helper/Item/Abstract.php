<?php
/** {license_text}  */
abstract class Open_Gallery_Helper_Item_Abstract
    extends Open_Gallery_Helper_Data
    implements Open_Gallery_Helper_Item_Interface
{

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

        unset($data['thumbnail'], $data['container_video_file']);

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
        $localPath = 'item' . DS . 'gallery' . DS;
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
        $controller->loadLayout();
        $controller->renderLayout();

        return $this;
    }
}
