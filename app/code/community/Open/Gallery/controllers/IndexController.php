<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

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
