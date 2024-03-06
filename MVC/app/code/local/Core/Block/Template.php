<?php

class Core_Block_Template extends Core_Block_Abstract
{
    public $template;
    protected $_child = [];
    public function toHtml()
    {
        $this->render();
    }
    public function addChild($key, $value)
    {
        $this->_child[$key] = $value;
    }
    public function removeChild($key)
    {

        if(isset($_child[$key])){
            unset($_child[$key]);
        }

    }
    public function getChild($key)
    {
        // return isset($this->_child[$key]) ? $this->_child[$key] : null;
        
        return $this->_child[$key];

    }
    public function getChildHtml($key)
    {
        $html = '';
        if ($key == '' && count($this->_child)) {
            foreach ($this->_child as $_child) {
                $html .= $_child->toHtml();
            }
        } else {

            $html = (isset($this->_child[$key])) ? $this->_child[$key]->toHtml() : null ;
        }
        return $html;
    }
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
    public function getTemplate()
    {
        return $this->template;
    }
    public function getUrl($path)
    {
        return $this->getRequest()->getUrl($path);
    }
    

   

   
}