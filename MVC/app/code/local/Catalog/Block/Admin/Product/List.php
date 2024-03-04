<?php

class Catalog_Block_Admin_Product_List extends Core_Block_Template
{


    public function getProductData()
    {

        $data = Mage::getModel('catalog/product')->getCollection();

        return $data->getData();
    }
}