<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

interface Open_Gallery_Helper_Item_Interface
{
    /**
     * @param Open_Gallery_Model_Item $item
     * @return array
     */
    public function getAllowedFormats(Open_Gallery_Model_Item $item = null);

    /**
     * @param Open_Gallery_Model_Item $item
     * @param Varien_Data_Form $form
     * @return Open_Gallery_Helper_Item_Interface
     */
    public function prepareEditForm(Open_Gallery_Model_Item $item, Varien_Data_Form $form);

    /**
     * @param Open_Gallery_Model_Item $item
     * @param array $scripts
     * @return array
     */
    public function prepareEditFormScripts(Open_Gallery_Model_Item $item, array $scripts);

    /**
     * @param Open_Gallery_Model_Item $item
     * @param Mage_Adminhtml_Controller_Action $controller
     * @return Open_Gallery_Helper_Item_Interface
     */
    public function prepareItemSave(Open_Gallery_Model_Item $item, Mage_Adminhtml_Controller_Action $controller);

    /**
     * @param Open_Gallery_Model_Item $item
     * @param Mage_Core_Controller_Varien_Action $controller
     * @return Open_Gallery_Helper_Item_Interface
     */
    public function prepareAndRenderView(Open_Gallery_Model_Item $item, Mage_Core_Controller_Varien_Action $controller);
}

