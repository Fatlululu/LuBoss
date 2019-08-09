<?php
use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;

class SysemController extends ControllerBase{

    public function indexAction(){
        $this->view->setVar('title',"系统配置");
        echo "11";
    }

    public function  menu_add(){

    }

}
