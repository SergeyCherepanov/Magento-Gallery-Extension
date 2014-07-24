<?php

class Open_Gallery_Block_Adminhtml_Item_Edit_Tabs
    extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('form_tabs');
        $this->setDestElementId('edit_form');
        $this->setData('title', Mage::helper('open_gallery')->__('Item Information'));
    }
}
