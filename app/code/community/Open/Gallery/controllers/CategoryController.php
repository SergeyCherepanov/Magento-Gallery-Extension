<?php

class Open_Gallery_CategoryController
        extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        /** @var Open_Gallery_Model_Category $category */
        $category = Mage::getModel('open_gallery/category');
        $category->load($this->getRequest()->getParam('id'));
        Mage::register('open_gallery_category', $category);

        $this->loadLayout();
        $this->renderLayout();
    }
}
