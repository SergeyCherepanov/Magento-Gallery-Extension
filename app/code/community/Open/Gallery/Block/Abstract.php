<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

abstract class Open_Gallery_Block_Abstract
    extends Mage_Core_Block_Template
{
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
     * @return string
     */
    public function getItemUrl(Open_Gallery_Model_Item $item)
    {
        return $this->getUrl('gallery/item/view', array('id' => $item->getId()));
    }

    /**
     * @param Varien_Object $object
     * @param int $width
     * @param int|null $height
     * @return string
     */
    public function getThumbnailUrl(Varien_Object $object, $width = 64, $height = null)
    {
        if (Open_Gallery_Model_Item::TYPE_IMAGE == $object->getData('type') && !$object->getData('thumbnail')) {
            $field = 'value';
        } else {
            $field = 'thumbnail';
        }

        return Mage::helper('open_gallery')->getImageUrl($object, $field, $width, $height);
    }
}
