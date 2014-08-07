<?php

class Open_Gallery_CategoryController
    extends Mage_Core_Controller_Front_Action
{
    /**
     * Gallery Page
     */
    public function viewAction()
    {
        /** @var Open_Gallery_Model_Category $category */
        $category = Mage::getModel('open_gallery/category');
        $category->load($this->getRequest()->getParam('id'));
        Mage::register('gallery_category', $category);

        $this->loadLayout();
        $this->renderLayout();
    }
}
