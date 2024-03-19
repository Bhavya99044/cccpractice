<?php
class Sales_Model_Resource_Order_History extends Core_Model_Resource_Abstract{
    public function __construct(){
        $this->init('order_history', 'history_id');
    }
}
?>