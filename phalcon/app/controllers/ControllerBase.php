<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Modle;
use Phalcon\Mvc\Dispatcher;


class ControllerBase extends Controller
{
    public function  initialize(){

    }
    //权限验证控制器，访问控制器之前
    public function beforeExecuteRoute($dispatcher){
        //获取控制器名字
        $controllerName = $dispatcher->getControllerName();
        //未登录返回登陆页面
        if($this->session->get('userInfo') == '' && $controllerName != 'login'){
            $this->response->redirect('login/index');
        }
        //空操作
        if(empty($controllerName)){
            //如果控制器为空。跳转错误页面，并检测是否登陆，登陆则回首页，没登陆则跳回登陆页面
        }

        //错误控制器，404
//        if($controllerName == 'login'){
//
//        }
    }

}
