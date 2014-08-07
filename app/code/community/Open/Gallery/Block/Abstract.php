<?php
/** {license_text}  */
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
        return Mage::helper('open_gallery')->getImageUrl($object, 'thumbnail', $width, $height);
    }
}
