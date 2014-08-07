<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Model_Resource_Category_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Initialize model
     */
    protected function _construct()
    {
        $this->_init('open_gallery/category');
    }

    /**
     * @param bool $withDepth
     * @return $this
     */
    public function prepareTree($withDepth = false)
    {
        $this->addFieldToSelect(array('parent_id'));
        foreach ($this->getItems() as $category) {
            /** @var $category Open_Gallery_Model_Category */
            $parentId = $category->getData('parent_id');
            if ($parentId) {
                /** @var $parentCategory Open_Gallery_Model_Category */
                $parentCategory = $this->getItemById($parentId);
                if ($parentCategory) {
                    $parentCategory->assignChild($category);
                }
            }
        }

        if ($withDepth) {
            $this->_calculateDepth($this->getItems());
        }

        return $this;
    }

    /**
     * @param array|Varien_Data_Collection $categories
     * @param int $depth
     * @return $this
     */
    protected function _calculateDepth($categories, $depth = 0)
    {
        /** @var $category Open_Gallery_Model_Category */
        foreach ($categories as $category) {
            if (0 == $depth && $category->getData('parent_id') > 0) {
                continue;
            }
            $category->setDepth($depth);
            $this->_calculateDepth($category->getChildren(), $depth + 1);
        }

        return $this;
    }
}
