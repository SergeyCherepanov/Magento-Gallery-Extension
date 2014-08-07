<?php
/** {license_text}  */
class Open_Gallery_Block_Item_View
    extends Open_Gallery_Block_Abstract
{
    /**
     * @return Open_Gallery_Model_Item
     */
    public function getItem()
    {
        return Mage::registry('gallery_item');
    }
}
