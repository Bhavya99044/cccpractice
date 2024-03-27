<?php


class Sales_Model_Order_History extends Core_Model_Abstract{

    public function init(){
        $this->_resourceClass="Sales_Model_Resource_Order_History";
        $this->_collectionClass="Sales_Model_Resource_Collection_Order_History";
        $this->_modelClass="sales/order_history";


    }

    public function addHistory($data){
        
            $this->addData('order_id',$data);
            $this->addData('from_status','pending');
            $this->addData('to_status','pending');
            $this->addData('action_by',1);
$this->save();
return $this;
 }

 public function updateData($order,$actionBy){
    $data=[
        'order_id' => $order['order_id'],
            'from_status' => $this->getStatus($order['order_id']),
            'to_status' => $order['status'],
            'action_by' => $actionBy
    ];
    
    $this->setData($data)->save();
    return $this;
 }
 public function getStatus($orderId)
 {
    echo'<pre>';
     $order = Mage::getModel('sales/order_history')->getCollection()->addFieldToFilter('order_id', $orderId)->getLastItem();
     print_r($order);


     $status=$order->gettoStatus();
     
     return $status;
 }
}
?>