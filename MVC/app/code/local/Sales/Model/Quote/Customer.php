<?php

class Sales_Model_Quote_Customer extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote_Customer';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote_Customer';
        $this->_modelClass = 'sales/quote_customer';
    }

    public function addCustomerAddress(Sales_Model_Quote $quote, $request)
    {
        // $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        // $customerData = Mage::getModel('customer/customer')->load($customerId);
        // $customerData->removeData('first_name')
        //     ->removeData('last_name')
        //     ->removeData('default')
        //     ->removeData('password');

        // print_r($request);
        $this->setData(
            // array_filter($customerData->getData())
            $request
        );
        $this->addData('quote_id', $quote->getId());
        $this->save();

        // return $this;
    }
}