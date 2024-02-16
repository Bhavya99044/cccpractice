<?php
class Core_Controller_Front
{

    public function init()
    {
        $requestModel = Mage::getModel('core/request');


        // $requestModel->getModuleName();
        // $requestModel->getActionName();
        // $requestModel->getControllerName();
        $action = $requestModel->getActionName() . "Action";

        $controller = $requestModel->getFullControllerClass();
        echo $controller;
        $obj = new $controller();

        // $action1 = $action . 'Action';
        return $obj->$action();
    }


}
?>