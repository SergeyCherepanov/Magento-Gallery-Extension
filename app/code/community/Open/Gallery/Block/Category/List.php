<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Block_Category_List
    extends Open_Gallery_Block_Abstract
{
    /** @var  Open_Gallery_Model_Resource_Item_Collection */
    protected $_categoryCollection;

    /**
     * @return Open_Gallery_Model_Resource_Item_Collection
     */
    public function getCategoryCollection()
    {
        if (is_null($this->_categoryCollection)) {
            $this->_categoryCollection = Mage::getResourceModel('open_gallery/category_collection');
            $this->_categoryCollection->addFieldToFilter('parent_id', (int) $this->getCategory()->getId());
        }

        return $this->_categoryCollection;
    }
}
