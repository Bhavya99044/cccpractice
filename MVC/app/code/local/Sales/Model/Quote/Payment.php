<?php

class Sales_Model_Quote_Payment extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Payment';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Payment';
        $this->_modelClass = 'sales/quote_payment';
    }
    public function addPaymentMethod(Sales_Model_Quote $quote, $request)
    {
        // echo "<pre>";
        // print_r($request);
        $item = $this->getCollection()
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        $this->setData(
            $request
        );
        if ($item) {
            $this->setId($item->getId());
        }
        $this->addData('quote_id', $quote->getId());
        $this->removeData('cvv');
        // print_r($this);
        // die;

        $this->save();

        return $this;
    }
}