<?php class LoanCalculator_Controller_User extends Core_Controller_Admin_Action{

public function formAction()
{
    $layout = $this->getLayout();
    
    $child = $layout->getChild('content');


    $productForm = $layout->createBlock('loanCalculator/form');
        
    $child->addChild('form', $productForm);


    $layout->toHtml();
}
public function listAction()
{
    $layout = $this->getLayout();
    
    $child = $layout->getChild('content');


    $productForm = $layout->createBlock('loanCalculator/form')
        ->setTemplate('calculator/list.phtml');
    $child->addChild('list', $productForm);

    $layout->toHtml();
}
public function saveAction()
{
    $data = $this->getRequest()->getParams('pdata');
    $productModel = Mage::getModel('loanCalculator/calculator');
    ;
    $productModel->setData($data)->save();
    
}
public function deleteAction()
    {

        Mage::getModel('loanCalculator/calculator')
            ->load($this->getRequest()->getParams('id', 0))
            ->delete();
    }


}