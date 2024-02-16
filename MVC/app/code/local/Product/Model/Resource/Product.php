<?php

class Product_Model_Resource_Product
{

    protected $_tableName = '';
    protected $_primaryKey = '';

    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }


    public function load($id, $column = null)
    {

        // echo 123;

        $query = "SELECT * FROM {$this->_tableName} WHERE{$this->_primaryKey}={$id}";
        $data = $this->getadapter()->fetchRow($query);
        echo $query;
        $result = $this->getAdapter()->fetchRow($query);
        print_r($result);
    }

    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }

    //Above Part is Abstract

    public function __construct()
    {
        $this->init("ccc_product", "id");
    }

    public function getPrimaryKey()
    {

    }

}