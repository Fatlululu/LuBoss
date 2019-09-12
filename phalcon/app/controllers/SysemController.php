<?php
//namespace  app\admin;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;

class SysemController extends ControllerBase{

    public function indexAction(){
        $this->view->setVar('title',"系统配置");
    }

    public function  menuAddAction(){
        $this->view->setVar('title',"系统配置修改");
    }

}
