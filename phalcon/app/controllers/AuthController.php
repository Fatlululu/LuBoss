<?php
/*
 * 权限控制器
 *
 *  */

//namespace  app\controller;

//use Phalcon\Mvc\Model;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Paginator\Adapter\Model as Paginager ;



class AuthController extends ControllerBase{

    public $title ;

//    public $table = "Fat";

    /**
     *角色列表
     */
    public function index(){
        $title = "角色列表";
        $list = FatSysemAuth::find('isDelete = 0');
        $numberPage = 1;
        if($this->request->getQuery('page','int') != ''){
            $numberPage = $this->request->getQuery('page','int');
        }
        $paginator = new  Paginager([
            'data'      => $list,
            'limit'     => 10,
            'page'      => $numberPage
        ]);
    }

    /**
     *
     */
    public function addAuth(){

    }

    /**
     *
     */
    public function editAuth(){

    }


    /**
     *
     */
    public function form(){

    }

    /**
     *
     */
    public function authList(){

    }
}