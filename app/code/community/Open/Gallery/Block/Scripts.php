<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Block_Scripts
    extends Open_Gallery_Block_Abstract
{
    /**
     * @return string
     */
    public function getRequireDirUrl()
    {
        return Mage::getBaseUrl('js') . 'open';
    }

    /**
     * @return string
     */
    public function getRequireUrl()
    {
        return Mage::getBaseUrl('js') . 'open/require.js';
    }

    /**
     * @return string
     */
    public function getBootstrapUrl()
    {
        return Mage::getBaseUrl('js') . 'open/gallery/bootstrap';
    }
}
