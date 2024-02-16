<?php

class Core_Model_Abstract
{

    protected $data = [];
    protected $resourceClass = '';
    protected $collectionClass = '';
    protected $resource = null;
    protected $collection = null;




    public function __construct()
    {
        $this->init();


    }

    public function setResourceClass($resourceClass)
    {
        $this->resourceClass = $resourceClass;
    }

    public function setCollectionClass($collectionClass)
    {
        $this->collectionClass = $collectionClass;
    }

    public function setId($id)
    {

    }

    public function getId()
    {

        return $this->data['id'];


    }

    public function getResource()
    {
        // $modelClass = get_Class($this);
        // $modelClass = 'Product_Model_Resource_Product';
        // // $result = str_replace("Product_Model_", "", $modelClass);
        // // echo substr_replace($modelClass, "",  strpos($string, "Product_Model_"), strlen("Product_Model_"));
        // // echo get_class($this);
        // return new $modelClass;

        return new $this->_resourceClass();
    }

    public function camelCase2UnderScore($str, $separator = "_")
    {
        if (empty($str)) {
            return $str;
        }
        $str = lcfirst($str);
        $str = preg_replace("/[A-Z]/", $separator . "$0", $str);
        return strtolower($str);
    }




    public function getCollection()
    {

    }

    public function getPrimaryKey()
    {

    }

    public function getTableName()
    {

    }

    public function __set($key, $value)
    {

    }

    public function __get($key)
    {

    }

    public function __unset($key)
    {

    }

    public function getData($key = null)
    {

    }

    public function setData($data)
    {

    }

    public function addData($key, $value)
    {

    }

    public function removeData($key = null)
    {

    }

    public function save()
    {

    }

    public function load($id, $column = null)
    {

        $this->_data = $this->getResource()->load($id, $column);

        // print_r($this->getResource());
        // return $this;


    }

    public function delete()
    {

    }
}