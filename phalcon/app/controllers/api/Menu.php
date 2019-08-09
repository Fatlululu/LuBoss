<?php
/*
 *获取导航菜单接口
 *
 *
 * */

namespace app\api;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model;



class Menu{

    /**
     *根据权限角色获取菜单
     */
    public function getMenuAction(){
        $menu_list = $this->session->get('adminMenu');
        if(!empty($menu_list)){
            return json_encode($menu_list);
        }else{
            $userInfo  = $this->session->get('userInfo');
//            $menu_list = \FatSysemMenu::find(['conditions'=>""]);
            $this->session->set('adminMenu',$menu_list);
            return json_encode($menu_list);
        }

    }



}
