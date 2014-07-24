<?php
/** {license_text}  */
class Open_Gallery_Helper_Item_Image
    extends Open_Gallery_Helper_Item_Abstract
{
    protected $_allowedFormats = array('jpeg', 'jpg', 'gif', 'png');

    /**
     * @param Open_Gallery_Model_Item $item
     * @param Varien_Data_Form $form
     * @return $this|Open_Gallery_Helper_Item_Interface
     */
    public function prepareEditForm(Open_Gallery_Model_Item $item, Varien_Data_Form $form)
    {
        return $this;
    }

    /**
     * @param Open_Gallery_Model_Item $item
     * @return array
     */
    public function getAllowedFormats(Open_Gallery_Model_Item $item = null)
    {
        return $this->_allowedFormats;
    }
}
