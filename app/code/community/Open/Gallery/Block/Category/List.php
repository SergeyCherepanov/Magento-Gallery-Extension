<?php
/** {license_text}  */
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
            /** @var Open_Gallery_Model_Category $category */
            $category = Mage::registry('gallery_category');
            $this->_categoryCollection = Mage::getResourceModel('open_gallery/category_collection');
            if ($category instanceof Open_Gallery_Model_Category) {
                $this->_categoryCollection->addFieldToFilter('parent_id', $category->getId());
            } else {
                $this->_categoryCollection->addFieldToFilter('parent_id', 0);
            }
        }

        return $this->_categoryCollection;
    }
}
