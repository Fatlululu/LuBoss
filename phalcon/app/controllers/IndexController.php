<?php
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model;

class IndexController extends ControllerBase
{

    //验证
//    public function initialize()
//    {
//        if($this->session->get('userId') == ''){
//            $this->response->redirect('login/index');
//        }
//    }

    /**
     *首页
     */
    public function indexAction()
    {
        $title = "首页";
        //顶级导航
        $nav_list = $this->session->get('nav_list');
        $user_info = $this->session->get('user_info');
        if(empty($nav_list)){
            $nav_list = FatSysemMenu::find(['conditions' => "pId  = 0"]);
            $this->session->set('nav_list',$nav_list);
        }
        $this->view->setVar('user_info',$user_info);
        $this->view->setVar('title',$title);
        $this->view->setVar('nav_list',$nav_list);

    }

    /**
     *欢迎页面
     */
    public function welcomeAction(){

    }

}

