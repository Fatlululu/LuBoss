<?php

/**
 * 导航与菜单栏接口
 * 根据权限获取导航与菜单栏
 */

use Phalcon\Mvc\Controller;
use common\service\AuthService;

class MenuApiController extends  Controller{

    /**
     * 初始化菜单
     * 根据权限获取菜单栏
     * @return false|string
     */
    public function  getMenuAction(){
        $menuList = $this->session->get('menuList');
        if(!empty($menu_list)){
            return json_encode($menu_list);
        }
        $navList = $this->getNavAction();
        $userInfo =  $this->session->get('userInfo');
        //获取角色，是否已经禁用
        $menuList = FatSysemMenu::getMenu($userInfo['aId'],$navList);
//        $menuList = [];
//        foreach ($navList as $k => $v){
//
//        }
      $this->session->set('menuList',$menuList);
        die(json_encode($menuList));
    }

    /**
     * 初始化顶层导航
     * @return false|string
     */
    public function getNavAction(){
        $navList = $this->session->get('navList');
        if(empty($nav_list)){
            $user_info =  $this->session->get('userInfo');
            $nav_list = FatSysemMenu::getNav($user_info['aId']);
        }
        return $nav_list;
    }

    /**
     *检查有无权限
     */
    public function checkAuth(){

    }
}
