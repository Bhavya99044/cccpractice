<?php
class Core_Model_Request
{

    protected $_getModuleName;
    protected $_getControllerName;
    protected $_getActionName;


    public function __construct()
    {
        $uri = $this->getRequestURI();
        $uri = array_filter(explode("/", $uri));

        $this->_getModuleName = isset($uri[0]) ? $uri[0] : "page";
        $this->_getControllerName = isset($uri[1]) ? $uri[1] : "index";
        $this->_getActionName = isset($uri[2]) ? $uri[2] : "index";

    }
    public function getParams($key = '')
    {
        return ($key == '')
            ? $_REQUEST
            : (isset($_REQUEST[$key])
                ? $_REQUEST[$key]
                : ''
            );
    }
    public function getPostData($key = '')
    {
        return ($key == '')
            ? $_POST
            : (isset($_POST[$key])
                ? $_POST[$key]
                : ''
            );
    }
    public function getQueryData($key = '')
    {
        return ($key == '')
            ? $_GET
            : (isset($_GET[$key])
                ? $_GET[$key]
                : ''
            );
    }
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }
        return false;
    }
    public function getRequestURI()
    {
        $requst = $_SERVER["REQUEST_URI"];
        $arr = str_replace("/practice/MVC/", "", $requst);
        return $arr;
    }

    public function getModuleName()
    {

        return $this->_getModuleName;

    }
    public function getControllerName()
    {
        return $this->_getControllerName;
    }
    public function getActionName()
    {
        return $this->_getActionName;

    }

    public function getFullControllerClass()
    {
        $classname = $this->_getModuleName . '_Controller_' . $this->_getControllerName;
        $classname = ucwords($classname, "_");
        return $classname;
    }
}
