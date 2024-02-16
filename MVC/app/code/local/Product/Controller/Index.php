<?php
class Product_Controller_Index extends Core_Controller_Front_Action
{

    public function indexAction()
    {
        echo '<pre>';
        $layout = $this->getLayout();
        print_r($layout);

    }

    public function testAction()
    {
        echo "anaan";
    }

    public function saveAction()
    {
        echo "ajaja";
    }

}
?>