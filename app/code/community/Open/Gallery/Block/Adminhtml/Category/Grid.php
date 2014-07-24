<?php

class Open_Gallery_Block_Adminhtml_Category_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * @return Open_Gallery_Helper_Data
     */
    protected function _getHelper()
    {
        return Mage::helper('open_gallery');
    }

    /**
     * Init Grid default properties
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('open_gallery_category_grid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        /** @var Open_Gallery_Model_Resource_Category_Collection $collection */
        $collection = Mage::getResourceModel('open_gallery/category_collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header'        => $this->_getHelper()->__('ID'),
            'width'         => '50px',
            'index'         => 'entity_id',
            'header_export' => 'entity_id',
        ));

        $this->addColumn('title', array(
            'header'        => $this->_getHelper()->__('Title'),
            'index'         => 'title',
            'header_export' => 'title',
        ));

        return parent::_prepareColumns();
    }

    /**
     * Grid url getter
     *
     * @return string current grid url for ajax
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/categoryAjaxGrid', array('_current' => true));
    }

    /**
     * @param Mage_Core_Model_Abstract $item
     * @return string
     */
    public function getRowUrl($item)
    {
        return $this->getUrl('*/*/edit', array('_current' => true, 'id' => $item->getId()));
    }
}
