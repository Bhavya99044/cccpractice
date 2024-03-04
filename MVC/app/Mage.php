<?php

class Mage
{
    private static $_registry;
    private static $_singleton;

    private static $baseDir = "C:/xampp/htdocs/intern/ccc";
    private static $baseUrl = 'http://localhost/intern/ccc';



    public static function init()
    {
        $frontController = new Core_Controller_Front();
        $frontController->init();
    }


    public static function getSingleton($className)
    {
        if (isset(self::$_singleton[$className])) {
            return self::$_singleton[$className];
        } else {
            return self::$_singleton[$className] = self::getModel($className);
        }
    }



    public static function getModel($className)
    {
        // $array = explode("/", $modelName);
        // $a = array_map("ucfirst", $array);
        // $fullName = $a[0]."_Model_".$a[1];
        // // echo $fullName;
        // return new $fullName();

        $className = str_replace("/", "_Model_", $className);
        $className = ucwords(str_replace("/", "_", $className), '_');
        return new $className();
    }
    public static function getBlock($className)
    {
        $className = str_replace("/", "_Block_", $className);
        $className = ucwords(str_replace("/", "_", $className), '_');
        return new $className();
    }


    public static function register($key, $value)
    {
        self::$_registry[$key] = $value;

    }

    public static function registry($key)
    {

    }

    public static function getBaseDir($subDir = null)
    {
        if ($subDir) {
            return self::$baseDir . "/" . $subDir;
        }
        return self::$baseDir;
    }
    public static function getBaseUrl($subUrl = null)
    {
        if ($subUrl) {
            return self::$baseUrl . "/" . $subUrl;
        }
        return self::$baseUrl.'/';
    }


}