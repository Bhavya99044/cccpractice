<?php

class Core_Block_Layout extends Core_Block_Template{


    public function __construct(){  
        
         $this->setTemplate('core/1column.phtml');
        
        $this->prepareChildren();
    }

    public function prepareChildren(){
        $header = $this->createBlock('page/Header');
        $footer = $this->createBlock('page/Footer');
        $content = $this->createBlock('page/Content');
        $head = $this->createBlock('page/Head');
        $massages = $this->createBlock('core/template');
        $massages->setTemplate('core/massages.phtml');

        $this->addChild('header',$header);
        $this->addChild('footer',$footer);
        $this->addChild('content',$content);
        $this->addChild('head',$head);
        $this->addChild('massages',$massages);
    }

    public function createBlock($className){
        return Mage::getBlock($className);
    }

    // public function getRequest(){
    //     return  Mage::getModel('core/request');
    // }

}