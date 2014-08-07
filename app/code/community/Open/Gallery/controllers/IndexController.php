<?php

class Open_Gallery_IndexController
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
