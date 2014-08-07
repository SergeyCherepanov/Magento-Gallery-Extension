<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Block_Adminhtml_Category_Grid_Container
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
        $this->_addButtonLabel = $this->__('Add New Category');

        parent::__construct();
    }
}
