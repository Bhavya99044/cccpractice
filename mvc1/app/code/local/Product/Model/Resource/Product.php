<?php

class Product_Model_Resource_Product {

    protected $_tableName = '';
    protected $_primaryKey = '';

    public function init($tableName, $primaryKey){
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }

    //Above Part is Abstract

    public function __construct(){
        $this->init("ccc_product","id");
    }

}