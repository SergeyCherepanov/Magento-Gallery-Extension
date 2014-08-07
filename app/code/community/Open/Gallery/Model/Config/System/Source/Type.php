<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

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
