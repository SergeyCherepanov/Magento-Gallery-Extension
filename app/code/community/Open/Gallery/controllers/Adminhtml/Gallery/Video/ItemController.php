<?php

class Open_Gallery_Adminhtml_Gallery_Video_ItemController
    extends Mage_Adminhtml_Controller_Action
{
    protected $_entityModel = 'open_gallery/item';

    /**
     * @return Mage_Core_Model_Abstract
     */
    protected function _getEntityModel()
    {
        /** @var Mage_Core_Model_Abstract $item */
        $item = Mage::getModel($this->_entityModel);
        $item->setData('type', Open_Gallery_Model_Item::TYPE_VIDEO);

        return $item;
    }

    protected function _initLayout()
    {
        $this->loadLayout();
        $this->initLayoutMessages(array('adminhtml/session'));
    }

    /**
     * Video items grid
     */
    public function listAction()
    {
        $this->_initLayout();
        $this->renderLayout();
    }

    /**
     * Video items grid
     */
    public function itemAjaxGridAction()
    {
        $this->loadLayout('adminhtml_gallery_video_item_list_grid');
        $this->renderLayout();
    }

    /**
     * Create new video
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Edit video item
     */
    public function editAction()
    {
        /** @var Open_Gallery_Model_Item $item */
        $item = $this->_getEntityModel();
        if ($id = $this->getRequest()->getParam('id')) {
            $item->load($id);
        }
        Mage::register('item', $item);
        $this->_initLayout();
        $this->renderLayout();
    }

    /**
     * Save video item
     */
    public function saveAction()
    {
        try {
            $request = $this->getRequest();
            if (!$request->isPost()) {
                Mage::throwException($this->__('Wrong request.'));
            }
            $data  = $request->getPost('item');
            /** @var Open_Gallery_Model_Item $model */
            $model = $this->_getEntityModel();
            if (isset($data['id'])) {
                $model->load($data['id']);
                unset($data['id']);
            }

            $model->getHelper()->prepareItemSave($model, $this);
            $model->save();

            if ($model->isObjectNew()) {
                $this->_getSession()->addSuccess($this->__('Item created successfully.'));
            } else {
                $this->_getSession()->addSuccess($this->__('Item information updated successfully.'));
            }

            $this->_redirect('*/*/list');

        } catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
            $this->_redirectReferer();
        } catch (Exception $e) {
            $this->_getSession()->addError($e->getMessage());
            Mage::logException($e);
            $this->_redirectReferer();
        }
    }

    /**
     * Delete video item
     */
    public function deleteAction()
    {
        try {
            $request  = $this->getRequest();
            /** @var Open_Gallery_Model_Item $item */
            $item = $this->_getEntityModel();
            $item->setId($request->getParam('id'));
            $item->delete();
            $this->_getSession()->addSuccess($this->__('Video was deleted successfully.'));
        } catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
            $this->_redirectReferer();
        } catch (Exception $e) {
            $this->_getSession()->addException($e, $this->__('Something went wrong...'));
            $this->_redirectReferer();
        }

        $this->_redirect('*/*');
    }
}
