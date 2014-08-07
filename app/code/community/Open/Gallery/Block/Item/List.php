<?php
/** {license_text}  */
class Open_Gallery_Block_Item_List
    extends Open_Gallery_Block_Abstract
{
    /** @var  Open_Gallery_Model_Resource_Item_Collection */
    protected $_itemCollection;

    /**
     * @return Open_Gallery_Model_Category
     */
    public function getCategory()
    {
        return Mage::registry('gallery_category');
    }

    /**
     * @return Open_Gallery_Model_Resource_Item_Collection
     */
    public function getItemCollection()
    {
        if (is_null($this->_itemCollection)) {
            $this->_itemCollection = $this->getCategory()->getItemCollection();
        }

        return $this->_itemCollection;
    }
}
