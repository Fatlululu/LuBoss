<?php
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class AdminUserController extends  ControllerBase{

    /**
     *用户列表
     */
    public function indexAction(){
        $numberPage = 1;
        if($this->request->getQuery("page","int") != ''){
            $numberPage = $this->request->getQuery("page","int");
        }
        $users = FatAdminUser::find([
            'conditions' => 'status => 0'
        ]);
        $paginator = new Paginator([
            "data"      => $users,
            "limit"     => 10,
            "page"      => $numberPage
        ]);
        $this->view->page =$paginator->getPaginate();

    }

    /**
     *资料修改
     */
    public function editInfoAction(){

    }

    /**
     *密码修改
     */
    public function editPasswordAction(){

    }

    /**
     *添加用户
     */
    public function addAction(){

    }



}