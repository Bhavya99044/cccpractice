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

    $addressData=$this->getRequest()->getParams('address');
    Mage::getSingleton('sales/quote')->addAddress($addressData);

    $shippingData=$this->getRequest()->getParams('sales_quote_shipping_method');
    $shipping=Mage::getSingleton('sales/quote')->addShipping($shippingData);

    
    
    Mage::getSingleton('sales/quote')->addshipId($shipping->getId());


    $payment=$this->getRequest()->getParams('sales_quote_payment_method');
    $payment=Mage::getSingleton('sales/quote')->addPayment($payment);
    Mage::getSingleton('sales/quote')->addPayId($payment->getId());


    Mage::getSingleton('sales/quote')->convert();

    }
}
?> 