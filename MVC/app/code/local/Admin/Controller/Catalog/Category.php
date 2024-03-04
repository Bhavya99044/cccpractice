<?php


class Admin_Controller_Catalog_Category extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        // $layout->getChild('head')->addJs('js/page.js');
        // $layout->getChild('head')->addJs('js/head.js');
        // $layout->getChild('head')->addCss('css/page.css');
        // $layout->getChild('head')->addCss('css/head.css');
        $layout->getChild('head')->addCss('product.css');
        $layout->getChild('head')->addCss('header.css');
        $layout->getChild('head')->addCss('footer.css');
        $layout->getChild('head')->addCss('category/category.css');
        $child = $layout->getChild('content');

        $productForm = $layout->createBlock('catalog/admin_category')
            ->setTemplate('category/form.phtml');
        $child->addChild('form', $productForm);


        $layout->toHtml();

    }


    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addJs('js/head.js');
        $layout->getChild('head')->addCss('css/page.css');
        $layout->getChild('head')->addCss('css/head.css');
        $child = $layout->getChild('content');

        $productForm = $layout->createBlock('catalog/admin_product_list')
            ->setTemplate('product/list.phtml');
        $child->addChild('list', $productForm);


        $layout->toHtml();

    }
    public function deleteAction()
    {

        Mage::getModel('catalog/category')
            ->load($this->getRequest()->getParams('id', 0))
            ->delete();

    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('cdata');
        $productModel = Mage::getModel('catalog/category');
        // $productModel->setData($data);
        // print_r($productModel);
        $productModel->setData($data)->save();
        print_r($productModel);
    }



}