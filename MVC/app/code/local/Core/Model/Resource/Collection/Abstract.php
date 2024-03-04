<?php
class Core_Model_Resource_Collection_Abstract
{
    protected $_resource = null;
    protected $_select = [];

    protected $_isLoaded = false;

    protected $_data = [];
    public function setResource(Core_Model_Resource_Abstract $resource)
    {
        $this->_resource = $resource;
        return $this;
    }

    public function getData()
    {
        if (!$this->_isLoaded) {
            $this->load();

        }
        return $this->_data;
    }

    public function select()
    {
        $this->_select['from'] = $this->_resource->getTableName();
        return $this;
    }

    public function addFieldToFilter($column, $filter)
    {
        $this->_select['where'][$column][] = $filter;
        return $this;
    }

    public function load()
    {
        $sql = "SELECT * FROM {$this->_select['from']} ";
        // echo "<pre>";
        //  echo $sql;
        if (isset($this->_select['where']) && count($this->_select['where'])) {

            $whereCond = [];
            foreach ($this->_select['where'] as $_field => $_filters) {

                foreach ($_filters as $_value) {
                    if (!is_array($_value)) {
                        $_value = ['eq' => $_value];
                    }
                    foreach ($_value as $_k => $_v) {
                        switch ($_k) {
                            case 'gt':
                                $whereCond[] = "`$_field` > '{$_v}' ";
                                break;
                            case 'in':
                                $whereCond[] = "`$_field` IN ( '{$_v}') ";
                                break;
                            case 'eq':
                                $whereCond[] = "`$_field` = '{$_v}' ";
                                break;
                            // default:
                            // $whereCond[] = "";
                        }
                    }
                }
                $whereCond = implode(" AND ", $whereCond);
                $sql .= "WHERE $whereCond";
            }
        }
        // echo $sql;die;
        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            $this->_data[] = Mage::getModel('catalog/product')->setData($row);
        }
        $this->_isLoaded = true;
        return $this;
    }
}
?>