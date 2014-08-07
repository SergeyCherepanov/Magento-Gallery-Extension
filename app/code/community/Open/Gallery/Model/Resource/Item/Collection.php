<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Model_Resource_Item_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('open_gallery/item');
    }

    /**
     * @return $this
     */
    protected function _afterLoadData()
    {
        foreach ($this->_data as $data) {
            if (isset($data['additional']) && strlen($data['additional'])) {
                $data['additional'] = Mage::helper('core')->jsonDecode($data['additional']);
            }
        }

        parent::_afterLoadData();
    }
}
