<?php
// class Page_Controller_Index
// {

//     public function indexAction()
//     {
//         // echo '<pre>';x
//         $layout = $this->getLayout()->toHtml();
//         // echo '<input type="text" name="test" values="as"><br>';
//         // $layout = $this->getLayout();
//         // print_r($this->getLayout());
//         // echo dirname(__FILE__);
//     }
//     public function testAction()
//     {

//         echo "hajjaka";
//         $layout = $this->getLayout();
//     }

//     public function saveAction()
//     {
//         echo "shsjs";
//     }
// }




class Page_Controller_Index extends Core_Controller_Front_Action
{

    public function indexAction()
    {
        $layout = $this->getLayout();
        print_r($layout);
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addJs('js/nav.js');
        $layout->getChild('head')->addCss('css/nav.js');
        $layout->getChild('head')->addCss('css/nav.js');
        //    print_r($layout->getChild('head'));

        $layout->toHtml();
    }

    public function saveAction()
    {
        $leyout = $this->getLayout()->toHtml();
    }

}
?>