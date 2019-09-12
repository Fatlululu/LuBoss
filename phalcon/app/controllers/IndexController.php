<?php
//namespace  app\admin;

use Phalcon\Mvc\View;
use Phalcon\Mvc\Model;

class IndexController extends ControllerBase
{
    public $ptitle = "首页";

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
        $userInfo = $this->session->get('userInfo');
        $navList = $this->session->get('navList');
        if(empty($nav_list)){
            $getNav = new MenuApiController();
            $navList = $getNav->getNavAction();
            $this->session->set('navList',$navList);
        }
        //系统资料
        $this->view->setVar('user_info',$userInfo);
        $this->view->setVar('title',$title);
        $this->view->setVar('ptitle',$this->ptitle);
        $this->view->setVar('navList',$navList);

    }

    /**
     *欢迎页面
     */
    public function welcomeAction(){

    }

}

