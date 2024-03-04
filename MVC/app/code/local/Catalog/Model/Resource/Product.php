<?php

class Catalog_Model_Resource_Product extends Core_Model_Resource_Abstract
{
    // protected $_tableName = null;
    // protected $_primaryKey = null;

    public function __construct()
    {
        $this->init('catalog_product','product_id');
    }


    // public function getPrimaryKey()
    // {
    //     return $this->_primaryKey;
    // }

    // public function getTableName()
    // {
    //     return $this->_tableName;
    // }

    // public function getAdapter()
    // {
    //     return new Core_Model_DB_Adapter();
    // }

    // public function load($id, $column = null)
    // {
    //     // echo "In product resource <br>";
    //     $sql = "SELECT * FROM {$this->_tableName} WHERE {$this->_primaryKey}={$id} LIMIT 1";
    //     return $this->getAdapter()->fetchRow($sql);
    // }

    // public function save(Catalog_Model_Product $product)
    // {

    //     $data = $product->getData();
    //     // print_r($data);

    //     if (isset($data[$this->getPrimaryKey()])) {
    //         unset($data[$this->getPrimaryKey()]);
    //         $sql = $this->updateSql(
    //             $this->getTableName(),
    //             $data,
    //             [$this->getPrimaryKey()->$product->getId()]
    //         );
    //         // $id = $this->getAdapter()->insert($this->getTableName(), $data);
    //         // $this->getAdapter()->update($this->getTableName(), [
    //         //     $this->getPrimaryKey() => $id,
    //         //     $this->getPrimaryKey() => $product->getId()
    //         // ]);
    //     }

    //     $insertData = $this->insertSql($this->getTableName(), $data);

    //     // echo $insertData; 
    //     $id = $this->getAdapter()->insert($insertData);
    //     ($product->setId($id));
    // }
    // public function insertSql($tbname, $data)
    // {
    //     $columns = $values = [];
    //     foreach ($data as $key => $val) {
    //         $columns[] = "`{$key}`";
    //         $values[] = "'" . addslashes($val) . "'";
    //     }
    //     $columns = implode(" , ", $columns);
    //     $values = implode(" , ", $values);

    //     return "INSERT INTO {$tbname}({$columns}) VALUES ({$values})";
    // }



    // public function updateSql($table_name, $data, $where)
    // {
    //     $tmp_data = [];
    //     $where_con_arr = [];

    //     foreach ($data as $column => $value) {
    //         $tmp_data[] = "`$column` = '$value'";
    //     }
    //     foreach ($where as $column => $value) {
    //         $where_con_arr[] = "`$column` = '$value'";
    //     }

    //     $columns_str = implode(",", $tmp_data);
    //     $where_con_str = implode(" AND ", $where_con_arr);
    //     $query = "UPDATE {$table_name} set {$columns_str} WHERE {$where_con_str}";
    //     return $query;
    // }


    // public function delete(Catalog_Model_Product $product)
    // {
    //     $sql =  $this->deleteSql($this->getTableName(), [$this->getPrimaryKey() => $product->getId()]);
    //     return $this->getAdapter()->delete($sql);
    // }

    // public function deleteSql($table_name, $where)
    // {
    //     $wherecond = [];
    //     foreach ($where as $col => $val) {
    //         $wherecond[] = "`$col` = '$val'";
    //     }
    //     $wherecond = implode("AND", $wherecond);
    //     return "DELETE FROM {$table_name} WHERE ({$wherecond})";
    // }






    // public function selectSql($table_name, $data, $where = [])
    // {
    //     if (is_array($data)) {
    //         $data_str = implode(',', $data);
    //     }
    //     $data_str = $data;
    //     if (!empty($where)) {
    //         $where_con_arr = [];
    //         foreach ($where as $field => $value) {
    //             $where_con_arr[] = "`$field`='$value'";
    //         }
    //         $where_con_str = implode(" AND ", $where_con_arr);
    //         $query = "SELECT {$data_str} FROM {$table_name} WHERE {$where_con_str}";
    //     } else {
    //         $query = "SELECT {$data_str} FROM {$table_name}";
    //     };
    //     return $query;
    // }

    // // Above all code move to resource abstract
    // public function init()
    // {
    //     $this->_tableName = "catalog_product";
    //     $this->_primaryKey = "product_id";
    // }
}
?>