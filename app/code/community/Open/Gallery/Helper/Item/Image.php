<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Helper_Item_Image
    extends Open_Gallery_Helper_Item_Abstract
{
    protected $_allowedFormats = array('jpeg', 'jpg', 'gif', 'png');

    /**
     * @param Open_Gallery_Model_Item $item
     * @param Varien_Data_Form $form
     * @return $this|Open_Gallery_Helper_Item_Interface
     */
    public function prepareEditForm(Open_Gallery_Model_Item $item, Varien_Data_Form $form)
    {
        $isReadonlyMode = false;
        foreach ($form->getElements() as $element) {
            /** @var Varien_Data_Form_Element_Abstract $element */
            if ($element instanceof Varien_Data_Form_Element_Fieldset
                && 'general_information' == $element->getId()) {
                $fieldSet = $element;

                $fieldSet->addField('value', 'image', array(
                    'name'      => 'item[value]',
                    'label'     => $this->__('Image File'),
                    'title'     => $this->__('Image File'),
                    'required'  => !$item->getData('value'),
                    'disabled'  => $isReadonlyMode,
                    'note'         => $this->__('Allowed format(s): <strong>%s</strong>', implode(', ', $item->getAllowedFormats()))
                        . '<br/>'
                        . $this->__('Your server allow you to upload files not more than <strong>%s</strong>. You can modify <strong>post_max_size</strong> (currently is %s) and <strong>upload_max_filesize</strong> (currently is %s) values in php.ini if you want to upload larger files.', $this->getDataMaxSize(), $this->getPostMaxSize(), $this->getUploadMaxSize()),
                ));

                break;
            }
        }

        return $this;
    }

    /**
     * @param Open_Gallery_Model_Item $item
     * @return array
     */
    public function getAllowedFormats(Open_Gallery_Model_Item $item = null)
    {
        return $this->_allowedFormats;
    }

    /**
     * @param Open_Gallery_Model_Item $item
     * @param Mage_Adminhtml_Controller_Action $controller
     * @return $this|Open_Gallery_Helper_Item_Interface
     * @throws Exception
     * @throws Mage_Core_Exception
     * @throws Open_Gallery_Exception
     */
    public function prepareItemSave(Open_Gallery_Model_Item $item, Mage_Adminhtml_Controller_Action $controller)
    {
        parent::prepareItemSave($item, $controller);

        $data = $controller->getRequest()->getPost('item');
        if (isset($data['value'], $data['value']['delete']) && !empty($data['value']['delete'])) {
            $item->deleteValueFile();
        } else if (
            isset($_FILES['item']['tmp_name']['value'])
            && $_FILES['item']['tmp_name']['value']
        ) {
            try {
                $savedFilePath = $this->_saveFile('item[value]', array('jpg', 'jpeg', 'png', 'gif'), 'image');
                $item->setData('value', $savedFilePath);
            } catch (Mage_Core_Exception $e) {
                throw $e;
            } catch (Exception $e) {
                Mage::logException($e);
                throw new Open_Gallery_Exception($this->__("Can't save image."));
            }
        }

        return $this;
    }
}
