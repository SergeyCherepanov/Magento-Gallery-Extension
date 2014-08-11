<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Block_Item_List
    extends Open_Gallery_Block_Abstract
{
    /** @var  Open_Gallery_Model_Resource_Item_Collection */
    protected $_itemCollection;

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
