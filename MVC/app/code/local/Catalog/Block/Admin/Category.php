<?php

class Catalog_Block_Admin_Category extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('category/form.phtml');
    }

    public function getProduct()
    {


        return Mage::getModel('catalog/category')
            ->load($this->getRequest()->getParams('id', 0));


    }
}