<?php
class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
        $this->_modelClass = 'sales/quote';
    }
     public function initQuote()
    {
        echo "<pre>";
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $customerId=Mage::getSingleton('core/session')->get('customer_id');

         if(!$quoteId) {
            
            $quote = Mage::getModel('sales/quote')
            ->setData(["tax_percent" => 8, "grand_total" => 0])
            ->save();

        
        if ($customerId) {
            $cartExist=Mage::getModel('sales/quote')
            ->addFieldToFilter('order_id',0)
            ->addFieldToFilter('customer_id',$customerId)
            ->addOrderBy('quote_id','DESC')
            ->getFirstItem();

            if($cartExist){
                $quote->addData('quote_id',$cartExist->getId());
            }
            $quote->addData('customer_id',$customerId);
           
        }
        $quoteId=$quote->save()->getId();
        Mage::getSingleton('core/session')->set('quote_id',$quote->getId());


    }
    else {
        if($customerId){
            $quoteId=Mage::getModel('sales/quote')->load($quoteId)
            ->addData('customer_id',$customerId)
            ->save()
            ->getId();

        }
    }
    $this->load($quoteId);
return $this;
}

    // public function initQuote()
    // {
    //     $quoteId = Mage::getSingleton("core/session")->get("quote_id");
    //     if ($quoteId) {
    //         // print_r($quoteId);
    //         $this->load($quoteId);
    //     }
    //     if (!$this->getId()) {
    //         $quote = Mage::getModel("sales/quote")
    //             ->setData(["tax_percent" => 8, "grand_total" => 0])
    //             ->save();
    //         Mage::getSingleton("core/session")->set("quote_id", $quote->getId());
    //         $quoteId = $quote->getId();
    //         $this->load($quoteId);
    //     }
    //     return $this;
    // }


    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')->getCollection()
            ->addFieldToFilter('quote_id', $this->getId());
    }

    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection()->getData() as $_item) {
            $grandTotal += $_item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal = $grandTotal + $tax;
        }
        $this->addData('grand_total', $grandTotal);
    }
    public function addProduct($request)
    {
        $this->initQuote();
        if ($this->getId()) {

         Mage::getModel("sales/quote_item")->addItem($this, $request['product_id'], $request['qty']);

        }

        $this->save();
    }


    public function removeProduct($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")->removeItem($this, $request['item_id']);
        }
        $this->save();
    }
    public function updateProduct($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel("sales/quote_item")->updateItem($this, $request['item_id'], $request['product_id'], $request['qty']);
        }
        $this->save();
    }
    public function addAddress($request)
    {
        $this->initQuote();   //farithi initquote km

        if ($this->getId()) {
            $id=Mage::getSingleton('core/session')->get('logged_in_customer_id');
            Mage::getModel('sales/quote_customer')
            ->setData($request)
            ->addData('quote_id',$this->getId())
            ->addData('customer_id',$id)
            ->save();
        }
        return $this;
    }

    public function addshipId($id){
        $this->initQuote();
        if($this->getId()){
            $this->addData('shipping_id',$id)->save();
        }
    }
    public function addPayment($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            
           return  Mage::getModel("sales/quote_payment")->setData($request)
           ->addData('quote_id',$this->getId())
           ->save();
        }
    }

    public function addPayId($id){
        $this->initQuote();
        if($this->getId()){
            $this->addData('payment_id',$id)->save();
        }
    }
    public function addShipping($request)
    {
        $this->initQuote();
        if ($this->getId()) {
          return Mage::getModel('sales/quote_shipping')
           ->setData($request)
           ->addData('quote_id',$this->getId())
           ->save();
        }
    }

    public function getShipping()
    {

        return Mage::getModel('sales/quote_shipping')->getCollection()->addFieldtoFilter('quote_id', $this->getId());

        ;


    }
    
    public function getPayment()
    {
      

        $pay= Mage::getModel('sales/quote_payment')->getCollection()->addFieldtoFilter('quote_id', $this->getId());
return $pay;


    }
    public function getCustomer()
    {

        $this->initQuote();

        return Mage::getModel("sales/quote_customer")
            ->getCollection()
            ->addFieldToFilter("quote_id", $this->getId())
            ->addFieldToFilter("customer_id", Mage::getModel("core/session")->get("logged_in_customer_id"))
            ->getFirstItem();



    }


    public function convert()
    {

        $this->initQuote();
            $orderNum=1;
        if($this->getId()){
        $order=$this->convertQuoteToOrder();
        $orderId=$order->getId();
            $item = $this->convertItemCollection($orderId);

        $address=$this->convertCustomerToOrder($orderId);
        $shipping=$this->convertQuoteToShipping($orderId);
        $payment=$this->convertQuoteToPayment($orderId);
        $this->addData('order_id',$order->getId())->save();
        $order->addData('payment_id',$payment->getId())->save();
        $order->addData('shipping_id',$shipping->getId())->save();


        $this->addHistory($orderId);

            }
      
        }

        public function addOrderNumber(){

            $lastOrder=Mage::getModel('sales/order')->getCollection()->getLastItem();
            if(!empty($lastOrder)){

               $lastNum= $lastOrder->getOrderNumber();
               $newOrderNum=$lastNum+1;


            }
            return $newOrderNum;
        }
        public function addHistory($orderId){
            return Mage::getModel('sales/order_history')->addHistory($orderId);
        }
       public function convertItemCollection($orderId)
    {
        foreach ($this->getItemCollection()->getData() as $_item) {
            Mage::getModel('sales/order_item')
                ->setData($_item->getData())
                ->removeData('item_id')
                ->removeData('quote_id')
                ->addData('order_id', $orderId)
                ->save();
        }
        return $this;
    }
        public function convertQuoteToShipping($orderId){

            $data=Mage::getModel('sales/quote_shipping')
            ->getCollection()
            ->addFieldToFilter('quote_id',$this->getId())
            ->getFirstItem();


return Mage::getModel('sales/order_shipping')           
            ->setData($data->getData())

            ->removeData('quote_id')
            ->removeData('shipping_id')
            ->addData('order_id',$orderId)
            ->save();
       }

       public function convertQuoteToPayment($orderId){

        $data=Mage::getModel('sales/quote_payment')
        ->getCollection()
        ->addFieldToFilter('quote_id',$this->getId())
        ->getFirstItem();

        return Mage::getModel('sales/order_payment')
        ->setData($data->getData())
        ->removeData('quote_id')
        ->removeData('payment_id')
        ->removeData('upi_id')
        ->addData('order_id',$orderId)
        ->save();

       }
        public function convertQuoteToOrder()
        {

            $orderNum=$this->addOrderNumber();
           return  Mage::getModel('sales/order')

            ->setData($this->getData())
            ->removeData('payment_id')
            ->removeData('shipping_id')
            ->removeData('quote_id')
            ->removeData('order_id')
            ->addData('order_number',$orderNum)
            ->save();
        }

        public function convertCustomerToOrder($id){


            if($this->getId()){
            $data=Mage::getModel('sales/quote_customer')
            ->getCollection()
            ->addFieldToFilter('quote_id',$this->getId())
            ->getFirstItem();

           return Mage::getMOdel('sales/order_customer')
           ->setData($data->getData())
           ->removeData('quote_customer_id')
           ->removeData('quote_id')
           ->addData('order_id',$id)
           ->save();
            // return Mage::getModel('sales/order_customer')
            // ->
        }
    }
}




    
