<?php


class Catalog_Model_Resource_Category
{
    protected $_tableName = null;
    protected $_primaryKey = null;

    public function __construct()
    {
        $this->init();
    }




    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }

    public function getTableName()
    {
        return $this->_tableName;
    }

    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }

    public function load($id, $column = null)
    {
        // echo "In category resource <br>";

        $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}={$id} LIMIT 1";

        return $this->getAdapter()->fetchRow($sql);
    }

    public function save(Catalog_Model_Category $category)
    {

        $data = $category->getData();
        // print_r($data);

        if (isset($data[$this->getPrimaryKey()])) {
            unset($data[$this->getPrimaryKey()]);
        }

        $insertData = $this->insertQuery($this->getTableName(), $data);

        // echo $insertData; 
        $id = $this->getAdapter()->insert($insertData);
        ($category->setId($id));

    }
    function insertQuery($tbname, $data)
    {
        $columns = $values = [];
        foreach ($data as $key => $val) {
            $columns[] = "`{$key}`";
            $values[] = "'" . addslashes($val) . "'";
        }
        $columns = implode(" , ", $columns);
        $values = implode(" , ", $values);

        return "INSERT INTO {$tbname}({$columns}) VALUES ({$values})";
    }

    function updateQuery($tbname, $data, $where)
    {
        $joint = $con = [];
        foreach ($data as $key => $val) {
            $columns[] = "`{$key}`" . "=" . "'" . addslashes($val) . "'";
        }
        foreach ($where as $key => $val) {
            $condition[] = "`{$key}`=" . "'" . addslashes($val) . "'";
        }
        $joint = implode(",", $columns);
        $con = implode(" AND ", $condition);
        // $where = implode(",",$where);
        return "UPDATE {$tbname} SET {$joint} WHERE {$con}";
    }

    // Above all code move to resource abstract
    public function init()
    {
        $this->_tableName = "catalog_category";
        $this->_primaryKey = "category_id";
    }

}