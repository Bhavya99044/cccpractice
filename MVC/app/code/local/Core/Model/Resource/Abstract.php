<?php
class Core_Model_Resource_Abstract
{
    protected $_tableName = null;
    protected $_primaryKey = null;
    // public function __construct()
    // {
    //     $this->init();
    // }
    // public function init()
    // {
    //     $this->_tableName = "catalog_product";
    //     $this->_primaryKey = "product_id";
    // }
    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;

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
    public function load($id, $columns = null)
    {
        $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}= {$id} LIMIT 1";
        // echo $sql;
        // die;
        return $this->getAdapter()->fetchRow($sql);
    }

    

    // 
    public function save(Core_Model_Abstract $product)//core model abstract $abstract
    {
        $data = $product->getData();
        // print_r($data[$this->getPrimaryKey()]);
        // die;
        if (isset($data[$this->getPrimaryKey()]) && !empty($data[$this->getPrimaryKey()])) {
            unset($data[$this->getPrimaryKey()]);
            $sql = $this->updateSql(
                $this->getTableName(),
                $data,
                [$this->getPrimaryKey() => $product->getId()]
            );
            $id = $this->getAdapter()->update($sql);
        } else {
            $sql = $this->inserSql($this->getTableName(), $data);
            $id = $this->getAdapter()->insert($sql);
            $product->setId($id);
        }


    }

    public function delete(Core_Model_Abstract $product)
    {
        $query = $this->deleteSql($this->getTableName(), [$this->getPrimaryKey() => $product->getId()]);
        $this->getAdapter()->delete($query);
    }

    public function deleteSql($tablename, $where)
    {
        $whereCond = [];


        foreach ($where as $_field => $_value) {

            $whereCond[] = "`$_field` = '$_value' ";

        }
        $whereCond = implode(" AND ", $whereCond);
        return "DELETE FROM `{$tablename}`  WHERE {$whereCond};";
        // echo "Your Data is deleted Successfully";
    }

    public function inserSql($tableName, $data)
    {

        $columns = $values = [];
        foreach ($data as $key => $value) {
            $columns[] = sprintf("`%s`", $key);
            $values[] = sprintf("'%s'", addslashes($value));
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        return "INSERT INTO {$tableName} ({$columns}) VALUES ({$values});";
    }
    public function updateSql($tablename, $data, $where)
    {
        $coloumns = $whereCond = [];

        foreach ($data as $_field => $_value) {
            $coloumns[] = "`{$_field}`= " . "'" . ($_value) . "'";

        }
        $coloumns = implode(", ", $coloumns);

        foreach ($where as $_field => $_value) {
            $whereCond[] = "`$_field` = " . "'" . ($_value) . "'";

        }
        $whereCond = implode(" AND ", $whereCond);
        return "UPDATE {$tablename} SET {$coloumns} WHERE {$whereCond}";
        // echo "Your Data is Updated Successfully";
    }
}