<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Admin_Action
{
    protected $_allowedAction=['form'];
    public function formAction()
    {
        $layout = $this->getLayout();
        // $layout->getChild('head')->addJs('js/page.js');
        // $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addCss('product/form.css');
        $layout->getChild('head')->addCss('header.css');
        $layout->getChild('head')->addCss('footer.css');
        $child = $layout->getChild('content');


        $productForm = $layout->createBlock('catalog/admin_product_form')
            ->setTemplate('catalog/admin/product/form.phtml');
        $child->addChild('form', $productForm);
 

        $layout->toHtml();
    }

   


    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addCss('product/list.css');
        $layout->getChild('head')->addCss('header.css');
        $layout->getChild('head')->addCss('footer.css');
        $child = $layout->getChild('content');


        $productForm = $layout->createBlock('catalog/admin_product_list')
            ->setTemplate('catalog/admin/product/list.phtml');
        $child->addChild('list', $productForm);

        $layout->toHtml();
    }

    public function deleteAction()
    {

        Mage::getModel('catalog/product')
            ->load($this->getRequest()->getParams('id', 0))
            ->delete();//$this
        //today irst we will check that this is available to data delete or not
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('pdata');
        $productModel = Mage::getModel('catalog/product');
        // $productModel->setData($data);
        // print_r($productModel);
        $productModel->setData($data)->save();
        // print_r($productModel);
        
    }
}
