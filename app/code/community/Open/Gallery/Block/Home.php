<?php
/**
 * @copyright Copyright (c) 2014 Sergey Cherepanov (sergey@cherepanov.org.ua)
 * @license Creative Commons Attribution 3.0 License
 */

class Open_Gallery_Block_Home
    extends Open_Gallery_Block_Category_List
{
    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        parent::_beforeToHtml();

        if (!$this->_template) {
            $this->_template = 'open/gallery/home.phtml';
        }

        return $this;
    }
}
