<?php
/** {license_text}  */
class Open_Gallery_Adminhtml_Gallery_Item_ImageController
    extends Open_Gallery_Controller_Adminhtml_Item_Abstract
{
    /**
     * @return Open_Gallery_Model_Item
     */
    protected function _getEntityModel()
    {

        /** @var Mage_Core_Model_Abstract $item */
        $item = Mage::getModel('open_gallery/item');
        $item->setData('type', Open_Gallery_Model_Item::TYPE_IMAGE);

        return $item;
    }
}
