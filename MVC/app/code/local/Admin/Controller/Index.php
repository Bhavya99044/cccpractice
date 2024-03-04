<?php

class Admin_Controller_Index extends Core_Controller_Admin_Action
{

    public function indexAction()
    {
        $layout = $this->getLayout();
        // $layout->removeChild('header');
        $layout->getChild('head')->addCss('product/form.css');
        $child = $layout->getChild('content');
        $bannerForm = $layout->createBlock('admin/');
        $child->addChild('bannerform', $bannerForm);
        $layout->toHtml();
       
    }


}

