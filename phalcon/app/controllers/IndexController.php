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

    public function indexAction()
    {
        $title = "首页";
        $this->view->setVar('title',$title);
    }


}

