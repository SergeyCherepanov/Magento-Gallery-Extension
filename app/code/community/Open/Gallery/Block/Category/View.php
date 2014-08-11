<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Block_Category_View
    extends Open_Gallery_Block_Abstract
{
    /** @var  Open_Gallery_Model_Category */
    protected $_category;

    /**
     * @return string
     */
    public function getItemListHtml()
    {
        if (!$this->getChild('item_list') instanceof Open_Gallery_Block_Item_List) {
            $listBlock = $this->getLayout()->createBlock('open_gallery/category_view_item_list', 'gallery_item_list', array('template' => 'open/gallery/item/list.phtml'));
            $this->append($listBlock, 'item_list');
        }

        $this->getChild('item_list')->setCategory($this->getCategory());

        return $this->getChildHtml('item_list');
    }

    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        parent::_beforeToHtml();

        if (!$this->_template) {
            $this->_template = 'open/gallery/category/view.phtml';
        }

        return $this;
    }
}
