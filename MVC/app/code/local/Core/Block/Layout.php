//
<?php
// class Core_Block_Layout extends Core_Block_Template
// {

//     public function __construct()
//     {
//         $this->setTemplate('core/1colum.phtml');
//         $this->prepareChildren();
//         return $this;
//         // return $this;
//     }
//     // public function prepareChildren($classname)
//     {
//         //  return Mage::getBlock($classname);
//         // $header = $this->createBlock('page/header');
//         $this->addChild('header', $header);

//         $header = $this->createBlock('page/footer'); -->
//         $this->addChild('footer', $footer);

//         $header = $this->createBlock('page/content');
//         $this->addChild('content', $content);

//         $header = $this->createBlock('page/heade');
//         $this->addChild('heade', $heade);

//     }
//     public function createBlock($classname)
//     {
//         Mage::getBlock('page/header');
//     }


// }
class Core_Block_Layout extends Core_Block_Template
{


    public function __construct()
    {

        $this->setTemplate('core/1column.phtml');

        $this->prepareChildren();
    }

    public function prepareChildren()
    {
        $header = $this->createBlock('page/Header');
        echo "<pre>";
        print_r($header);
        $footer = $this->createBlock('page/Footer');
        $content = $this->createBlock('page/Content');
        $head = $this->createBlock('page/Head');
        $messages = $this->createBlock('core/template');
        $messages->setTemplate('core/messages.phtml');

        $this->addChild('header', $header);
        $this->addChild('footer', $footer);
        $this->addChild('content', $content);
        $this->addChild('head', $head);
        $this->addChild('messages', $messages);
    }

    public function createBlock($className)
    {
        return Mage::getBlock($className);
    }
}

// public function getRequest(){
//     return  Mage::getModel('core/request');
// }
//       ?>