<?php

class Page_Controller_Index extends Core_Controller_Front_Action
{

    public function indexAction()
    {
        $layout = $this->getLayout();
        // $layout->getChild('head')->addJs('js/page.js');
        // $layout->getChild('head')->addJs('js/head.js');
        // $layout->getChild('head')->addCss('style.css');
        // $layout->getChild('head')->addCss('css/head.css');
        // echo "<pre>";

        // print_r($layout->getChild('head')->addCss('header.css'));
        $layout->getChild('head')->addCss('header.css');
        $layout->getChild('head')->addCss('footer.css');
        // echo "<pre>";
        // print_r($layout->getChild('head')->addCss('footer.css'));
        $child = $layout->getChild('content');


        $banner = $layout->createBlock('core/template')
            ->setTemplate('banner/banner.phtml');
        $child->addChild('banner', $banner);

       


        $layout->toHtml();
    }


}

