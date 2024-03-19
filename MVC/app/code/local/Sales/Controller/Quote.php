<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        $request = $this->getRequest()->getParams('cart');
        $quote = Mage::getSingleton('sales/quote')
            ->addProduct($request);
        $this->setRedirect('cart');
    }
    public function deleteAction()
    {
        $itemId = $this->getRequest()->getParams('id');
        $request = ['item_id' => $itemId];
        $quote = Mage::getSingleton('sales/quote')
            ->removeProduct($request);
        $this->setRedirect('cart');
    }
    public function updateAction()
    {
        $request = $this->getRequest()->getParams('cart');

        $quote = Mage::getSingleton('sales/quote')
            ->updateProduct($request);
        $this->setRedirect('cart');
    }

    public function addressAction()
    {
        $request = $this->getRequest()->getParams('checkout');
        $checkout = Mage::getSingleton('sales/quote')->addAddress($request);
        $this->setRedirect('cart/checkout');
    }
    public function convertAction()
    {


        // $shipping=$this->getRequest()->getParams('sales_quote_shipping_method');
        // $payment=$this->getRequest()->getParams('sales_quote_payment_method');

        $request=$this->getRequest()->getPostData();
        Mage::getSingleton('sales/quote')->convert($request);

        // $this->setRedirect('customer/order/order');

        // print_r($request);

        //ahiya quote and cutomer id kyathi aavi



        // $addressRequest = $this->getRequest()->getParams('address');
        // $addressData = Mage::getModel('sales/quote')->addAddress($addressRequest);
        // $paymentRequest = $this->getRequest()->getParams('sales_quote_payment_method');
        // $paymentData = Mage::getModel('sales/quote')->addPayment($paymentRequest);
        // $shippingRequest = $this->getRequest()->getParams('sales_quote_shipping_method');
        // $shippingData = Mage::getModel('sales/quote')->addShipping($shippingRequest);

        // Mage::getSingleton('sales/quote')->convert();
        // // Mage::getSingleton('core/session')->remove('quote_id');
        // // $this->setRedirect('');
    }
}
?>