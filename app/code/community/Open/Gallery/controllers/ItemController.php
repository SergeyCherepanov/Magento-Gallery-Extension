<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_ItemController
    extends Mage_Core_Controller_Front_Action
{
    /**
     * Prepare View Page
     */
    public function viewAction()
    {
        /** @var Open_Gallery_Model_Item $item */
        $item = Mage::getModel('open_gallery/item');
        $item->load($this->getRequest()->getParam('id'));

        Mage::register('gallery_item', $item);

        if ($item->getId()) {
            $item->getHelper()->prepareAndRenderView($item, $this);
        } else {
            $this->_redirectReferer();
        }
    }
}
