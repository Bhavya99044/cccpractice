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
        if (!empty ($quoteId)) {
            $this->load($quoteId);
        }
        if (!$this->getId()) {
            $quote = Mage::getModel('sales/quote')
                ->setData(["tax_percent" => 8, "grand_total" => 0])
                ->save();
            Mage::getSingleton('core/session')->set('quote_id', $quote->getId());
            $quoteId = $quote->getId();
            $this->load($quoteId);
        }

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
            Mage::getModel("sales/quote_customer")->addCustomerAddress($this, $request);
        }
        $this->save();
    }
    public function addPayment($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            
            $paymentId = Mage::getModel("sales/quote_payment")->addPaymentMethod($this, $request)->getId();
            $this->addData('payment_id', $paymentId);
        }
        // print_r($this);
        $this->save();
        // return $this;
    }
    public function addShipping($request)
    {
        $this->initQuote();
        if ($this->getId()) {
            $shippingId = Mage::getModel("sales/quote_shipping")->addShippingMethod($this, $request)->getId();
            // print_r($shippingId);
            $this->addData('shipping_id', $shippingId);
        }
        $this->save();
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


    public function convert($request)
    {

        $address = $request['address'];
        // print_r($address);die;
        $shipping = $request['sales_quote_shipping_method'];

        $payment = $request['sales_quote_payment_method'];
        $this->initQuote();

       
        if ($this->getId()) {

            $this->addAddress($address);
            $this->addPayment($payment);
            $this->addShipping($shipping);
            
            $order = Mage::getModel('sales/order')->addOrder($this);
           
            $customerOrder = Mage::getModel('sales/order_customer')->addCustomer($this->getCustomer(), $order->getId());
           
            foreach ($this->getItemCollection() as $_item) {
                Mage::getModel("sales/order_item")->addItem($_item, $order->getId());
            }
           
            $this->addData("order_id", $order->getId())->save();
            foreach ($shippingOrder = $this->getShipping()->getData() as $shipping) {

                $shipping->addData('order_id', $order->getId());

                $shipping->removeData('quote_id');
                $shipping->removeData('shipping_id');
                $shippingData = $shipping->getData();
                Mage::getModel('sales/order_shipping')->setData($shippingData)->save();


            }
            foreach ($paymentOrderOrder = $this->getPayment()->getData() as $payment) {
                
                $payment->addData('order_id', $order->getId());
                $payment->removeData('quote_id');
                $payment->removeData('payment_id');
                $payment->removeData('upi_id');
                $paymentData = $payment->getData();
              
                Mage::getModel('sales/order_payment')->setData($paymentData)->save();


            }
            ;

        }




    }
}