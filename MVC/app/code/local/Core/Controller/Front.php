<?php

class Core_Controller_Front
{
    public function init()
    {
        $request = Mage::getModel('core/request');                //Core_Model_Request
        $actionName = $request->getActionName() . 'Action';          //indexAction
        $fullClassName = $request->getFullControllerClass();
        $controller = new $fullClassName();
        $controller->$actionName();                               //call indexAction method in Page_Controller_Index class
    }
}