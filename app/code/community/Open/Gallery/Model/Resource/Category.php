<?php

class Open_Gallery_Model_Resource_Category
    extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('open_gallery/category', 'entity_id');
    }
}
