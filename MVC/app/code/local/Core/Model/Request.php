<?php
class Core_Model_Request
{

    protected $getModelName;
    protected $getControllerName;
    protected $getActionName;


    public function __construct()
    {
        $uri = $this->getRequestURI();
        $uri = explode("/", $uri);

        $this->getModelName = $uri[0];
        $this->getControllerName = $uri[0];
        $this->getActionName = $uri[0];

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
        $arr = str_replace("/ccc/mvc/", "", $requst);
        return $arr;
    }

    public function getModuleName()
    {

        return $this->getModuleName();

    }
    public function getControllerName()
    {
        return $this->getControllerName();
    }
    public function getActionName()
    {
        return $this->getActionName();

    }

    public function getFullControllerClass()
    {
        $fullControllerClass = "Page_" . $this->controllerName . "_" . $this->moduleName;
        return $fullControllerClass;
    }
}
