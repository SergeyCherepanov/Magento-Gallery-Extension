<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Model_Config_System_Source_Category
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        /** @var $categories Open_Gallery_Model_Resource_Category_Collection */
        $categories = Mage::getResourceModel('open_gallery/category_collection');
        $categories->addFieldToSelect(array('entity_id', 'title'));
        $categories->prepareTree(true);

        return array_merge(array('0' => 'None'), $this->getCategoryTree($categories));
    }

    /**
     * @param array|Varien_Data_Collection $categories
     * @param array $result
     * @param int $level
     * @return array
     */
    public function getCategoryTree($categories, $result = array(), $level = 0)
    {
        if (!empty($categories)) {
            /** @var $category Open_Gallery_Model_Category */
            foreach ($categories as $category) {
                if ($level == $category->getDepth()) {
                    $result[$category->getId()] = str_repeat('- ', $category->getDepth()) . $category->getData('title');
                    $result = $this->getCategoryTree($category->getChildren(), $result, $level + 1);
                }
            }
        }

        return $result;
    }
}
