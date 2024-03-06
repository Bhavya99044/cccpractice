<?php
class LoanCalculator_Block_Form extends Core_Block_Template{
    public function __construct(){

        $this->setTemplate('calculator/form.phtml');

    }

    public function getBankRates()
    {


        return Mage::getModel('loanCalculator/calculator')
             ->load($this->getRequest()->getParams('id', 0));


    }
    public function getProductData()
    {

        $data = Mage::getModel('loanCalculator/calculator')->getCollection();

        return $data->getData();
    }
}
?>