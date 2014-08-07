<?php
/** {license_text}  */
class Open_Gallery_Block_Category_View
    extends Open_Gallery_Block_Abstract
{
    /**
     * @return Open_Gallery_Model_Category
     */
    public function getCategory()
    {
        return Mage::registry('gallery_category');
    }
}
