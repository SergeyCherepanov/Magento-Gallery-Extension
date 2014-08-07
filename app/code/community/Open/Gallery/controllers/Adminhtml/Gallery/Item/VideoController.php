<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Adminhtml_Gallery_Item_VideoController
    extends Open_Gallery_Controller_Adminhtml_Item_Abstract
{
    /**
     * @return Open_Gallery_Model_Item
     */
    protected function _getEntityModel()
    {

        /** @var Mage_Core_Model_Abstract $item */
        $item = Mage::getModel('open_gallery/item');
        $item->setData('type', Open_Gallery_Model_Item::TYPE_VIDEO);

        return $item;
    }
}
