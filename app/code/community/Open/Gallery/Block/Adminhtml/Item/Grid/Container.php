<?php

class Open_Gallery_Block_Adminhtml_Item_Grid_Container
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Initialize class prefixes and labels
     */
    public function __construct()
    {
        $this->_blockGroup = 'open_gallery';
        $this->_controller = 'adminhtml_item';
        $this->_headerText = $this->__('Manage Items');

        parent::__construct();
    }
}
