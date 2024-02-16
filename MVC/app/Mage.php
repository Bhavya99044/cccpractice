<?php
class Mage
{
    private static $baseDir = "C:/xampp\htdocs\practice\MVC";
    public static function init()
    {
        // $request = new Core_Model_Request();
        //  $request->getRequestURI();

        $cnObj = new Core_Controller_Front();
        $requestModel = Mage::getModel("core/request");

        echo $requestModel->getRequestURI();
        $cnObj->init();

    }
    public static function getModel($className)
    {

        $arg = str_replace("/", "_Model_", $className);

        $arg = ucwords($arg);

        return new $arg;
    }

    public static function getBlock($className)
    {

        $arg = str_replace("/", "_Block_", $className);

        $arg = ucwords($arg);

        return new $arg;
    }

    public static function getBaseDir($subDir = null)
    {
        if ($subDir) {
            return self::$baseDir . "/" . $subDir;
        }
        return self::$baseDir;
    }
}
// insert ignore
// insert duplicate unique key mark karine
// use 3 key as combination
// where jevi rite in use kariye e rite in ma
// limit date_offset_getfind in set_error_handlerprice wise attendsing oder ma lai

?>