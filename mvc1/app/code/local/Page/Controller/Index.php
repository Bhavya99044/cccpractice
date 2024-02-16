<?php


class Page_Controller_Index extends Core_Controller_Front_Action{

    public function indexAction(){
       $layout = $this->getLayout();

       $layout->getChild('head')->addJs('js/page.js');
       $layout->getChild('head')->addJs('js/nav.js');
       $layout->getChild('head')->addCss('css/nav.js');
       $layout->getChild('head')->addCss('css/nav.js');
    //    print_r($layout->getChild('head'));

       $layout->toHtml(); 
    }

    public function saveAction(){
        $leyout = $this->getLayout()->toHtml();
    }
    
}
