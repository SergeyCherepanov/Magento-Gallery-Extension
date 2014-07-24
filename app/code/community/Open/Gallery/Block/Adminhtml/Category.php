<?php

class Open_Gallery_Block_Adminhtml_Category
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Initialize class prefixes and labels
     */
    public function __construct()
    {
        $this->_blockGroup = 'open_gallery';
        $this->_controller = 'adminhtml_category';
        $this->_headerText = $this->__('Manage Categories');

        parent::__construct();
    }
}
