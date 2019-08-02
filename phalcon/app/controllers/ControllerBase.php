<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Modle;

class ControllerBase extends Controller
{
    public function  initialize(){

    }
        //身份验证控制器
    public function beforeExecuteRoute($dispatcher){
        //获取控制器名字
        $controllerName = $dispatcher->getControllerName();
    }

}
