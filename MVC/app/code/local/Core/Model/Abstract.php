<?php

class Core_Model_Abstract
{
    protected $_data = [];
    protected $_resourceClass = '';
    protected $_collectionClass = '';
    protected $_resource = null;
    protected $_collection = null;
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        
    }

    public function setResourceClass($_resourceClass)
    {
    }


    public function setCollectionClass($_collectionClass)
    {
    }


    public function setId($id)
    {
        $this->_data[$this->getResource()->getPrimaryKey()] = $id;
        return $this;

    }


    public function getId()
    {
        // print_r( $this->_data[$this->getResource()->getPrimaryKey()]); die;
        return  $this->_data[$this->getResource()->getPrimaryKey()];
    }


    public function getResource()
    {

        return new $this->_resourceClass();
    }


    public function getCollection()
    {
        $collection = new $this->_collectionClass();
        $collection->setResource($this->getResource());
        $collection->select();
        return $collection;
    }





    public function __set($key, $value)
    {
    }


    public function __get($key)
    {
    }

    public function __call($name, $args)
    {
        // $name = strtolower(substr($name, 3));
        $name = $this->camelTodashed(substr($name, 3));
        return isset($this->_data[$name])
            ? $this->_data[$name]
            : "";
    }
    public function dashesToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }
        return $str;
    }
    public function camelTodashed($className)
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $className));
    }
    public function __unset($key)
    {
    }


    public function getData($key = null)
    {
       
        return($this->_data);
    }


    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }


    public function addData($key, $value)
    {
    }


    public function removeData($key = null)
    {
    }


    public function save()
    {
        $this->getResource()->save($this);
        return $this;
    }


    public function load($id, $column = null)
    {

        $this->_data = $this->getResource()->load($id, $column);
        // print_r($this->_data);
        // echo "SELECT * FROM {$this->getResource()->getTableName()} WHERE {$this->getResource()->getPrimaryKey()} = {$id}  LIMIT 1";
        return $this;
    }


    public function delete()
    {
        if ($this->getId()) {
            $this->getResource()->delete($this);
        }// ama if add thyu che check kar leje
        return $this;
    }
}
