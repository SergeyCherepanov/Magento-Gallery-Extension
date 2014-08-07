<?php

class Open_Gallery_IndexController
    extends Mage_Core_Controller_Front_Action
{
    /**
     * Gallery Home
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}
