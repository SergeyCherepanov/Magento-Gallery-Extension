<?php
class Open_Gallery_Model_Config_System_Source_Type
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
       return Mage::helper('open_gallery/item_video')->getAvailableTypes();
    }
}
