<?php
class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{


    protected $_allowedAction = [];
    protected $_layout = null;
    public function init()
    {
        $this->getLayout()->setTemplate('core/admin.phtml');

        if (!in_array($this->getRequest()->getActionName(), $this->_allowedAction) && !Mage::getSingleton('core/session')->get("logged_in_admin_user_id")) {
            $this->setRedirect('admin/user/login');
        }
        return $this;
    }
    // public function init(){
    //     // $this->AddLayout();
    //     $this->getLayout()->setTemplate('core/admin.phtml');
    //     if (
    //         !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
    //         !Mage::getSingleton('core/session')->get('logged_in_admin_user_id')
    //     ) {
    //         $this->setRedirect('admin/user/login');
    //     }
    //     return $this;
    //   }
    //admin/banner/formAction
    // file path = root folder>media>banner>xyz.jpg
    // store xyz.jpg in database
    // //admin/banner/list
    // list all banner here with edit and delete
    // edit will open form and user can see image2wbmp(
    //     mcrypt_module_close(banner)
    //)
}
