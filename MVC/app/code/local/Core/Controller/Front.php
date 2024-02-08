<?php
class Core_Controller_Front
{

    public function init()
    {
        $requestModel = new Core_Model_Request();
        // $requestModel->getModuleName();
        // $requestModel->getActionName();
        // $requestModel->getControllerName();
        $action = $requestModel->getActionName();
        $controller = $requestModel->getFullControllerClass();
        $obj = new $controller();

        $obj->$action();
    }


}
?>