<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Block_Adminhtml_Category_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected $_objectId   = 'id';
    protected $_controller = 'adminhtml_category';
    protected $_blockGroup = 'open_gallery';

    /**
     * @return Open_Gallery_Helper_Data
     */
    protected function _getHelper()
    {
        return Mage::helper('open_gallery');
    }

    public function __construct()
    {
        parent::__construct();
        $this->_updateButton('save', 'label', $this->_getHelper()->__('Save Category'));
        $this->_updateButton('delete', 'label', $this->_getHelper()->__('Delete Category'));
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        /** @var Open_Gallery_Model_Category $category */
        $category = Mage::registry('category');
        if ($category->getId()) {
            return $this->_getHelper()->__("Edit category '%s'", $this->escapeHtml($category->getData('title')));
        }
        else {
            return $this->_getHelper()->__('New Category');
        }
    }
}
