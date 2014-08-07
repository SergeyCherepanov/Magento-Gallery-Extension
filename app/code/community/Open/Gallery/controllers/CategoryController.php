<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_CategoryController
    extends Open_Gallery_Controller_Abstract
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
