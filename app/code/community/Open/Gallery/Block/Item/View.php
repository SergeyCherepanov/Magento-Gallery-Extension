<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

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
