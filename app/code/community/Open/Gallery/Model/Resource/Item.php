<?php

class Open_Gallery_Model_Resource_Item
    extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('open_gallery/item', 'entity_id');
    }

    /**
     * @param Varien_Object $object
     * @param string $table
     * @return array
     */
    protected function _prepareDataForTable(Varien_Object $object, $table)
    {
        $data = parent::_prepareDataForTable($object, $table);

        if (is_array($object->getData('additional'))) {
            $data['additional'] = Mage::helper('core')->jsonEncode($object->getData('additional'));
        }

        return $data;
    }

    /**
     * @param Mage_Core_Model_Abstract $object
     * @return Mage_Core_Model_Resource_Db_Abstract
     */
    protected function _afterLoad(Mage_Core_Model_Abstract $object)
    {
        if ($object->getData('additional')) {
            $object->setData('additional', Mage::helper('core')->jsonDecode($object->getData('additional')));
        }

        return parent::_afterLoad($object);
    }
}
