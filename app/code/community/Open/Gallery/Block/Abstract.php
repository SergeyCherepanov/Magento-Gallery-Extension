<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

abstract class Open_Gallery_Block_Abstract
    extends Mage_Core_Block_Template
{
    /** @var  Open_Gallery_Model_Category|null */
    protected $_category;

    protected function _prepareLayout()
    {
        $handles = $this->getLayout()->getUpdate()->getHandles();

        if (!in_array('open_gallery_scripts', $handles)) {
            $this->getLayout()->getUpdate()->addHandle('open_gallery_scripts');
        }

        parent::_prepareLayout();
    }

    /**
     * @param Open_Gallery_Model_Category $category
     */
    public function setCategory(Open_Gallery_Model_Category $category)
    {
        $this->_category = $category;
    }

    /**
     * @return Open_Gallery_Model_Category
     * @throws Open_Gallery_Exception
     */
    public function getCategory()
    {
        if (!$this->_category) {
            if ($this->getData('category_id')) {
                $this->_category = Mage::getModel('open_gallery/category')->load($this->getData('category_id'));
            } else {
                $this->_category = Mage::registry('gallery_category');
            }

            if (!$this->_category instanceof Open_Gallery_Model_Category) {
                $this->_category = Mage::getModel('open_gallery/category');
            }
        }

        return $this->_category;
    }

    /**
     * @param Open_Gallery_Model_Category $category
     * @return string
     */
    public function getCategoryUrl(Open_Gallery_Model_Category $category)
    {
        return $this->getUrl('gallery/category/view', array('id' => $category->getId()));
    }

    /**
     * @param Open_Gallery_Model_Item $item
     * @param array $params
     * @return string
     */
    public function getItemUrl(Open_Gallery_Model_Item $item, $params = array())
    {
        return $this->getUrl('gallery/item/view', array_merge($params, array('id' => $item->getId())));
    }

    /**
     * @param Varien_Object $object
     * @param int $width
     * @param int|null $height
     * @return string
     */
    public function getThumbnailUrl(Varien_Object $object, $width = null, $height = null)
    {
        if (Open_Gallery_Model_Item::TYPE_IMAGE == $object->getData('type') && !$object->getData('thumbnail')) {
            $field = 'value';
        } else {
            $field = 'thumbnail';
        }

        return Mage::helper('open_gallery')->getThumbnailUrl($object, $field, $width, $height);
    }

    /**
     * @param Open_Gallery_Model_Item $object
     * @param null $width
     * @param null $height
     * @return string
     */
    public function getItemBoxUrl(Open_Gallery_Model_Item $object, $width = null, $height = null)
    {
        switch ($object->getData('type')) {
            case Open_Gallery_Model_Item::TYPE_IMAGE:
                return Mage::helper('open_gallery')->getBoxImageUrl($object, 'value', $width, $height);
                break;
            default:
                return $this->getItemUrl($object);
                break;
        }
    }
}
