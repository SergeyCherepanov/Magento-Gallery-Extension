<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

abstract class Open_Gallery_Controller_Abstract
    extends Mage_Core_Controller_Front_Action
{
    /**
     * Prepare menu and handles
     */
    public function addActionLayoutHandles()
    {
        parent::addActionLayoutHandles();

        $update = $this->getLayout()->getUpdate();
        $update->addHandle('open_gallery');
        $update->addHandle('open_gallery_scripts');
    }
}
