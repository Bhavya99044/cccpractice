<?php
class Mage
{
    public static function init()
    {
        // $request = new Core_Model_Request();
        // $request->getRequestURI();

        $cnObj = new Core_Controller_Front();
        // $requestModel = Mage::getModel("core/request");

        // echo $requestModel->getRequestURI();
        $cnObj->init();

    }
    public static function getModel($className)
    {

        $arg = str_replace("/", "_Model_", $className);

        $arg = ucwords($arg);

        return new $arg;
    }




}
