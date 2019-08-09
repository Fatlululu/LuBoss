<?php
/*
 * 登陆控制器
 * */
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\View;

class LoginController extends ControllerBase{

    /**
     * 登陆
     * @return mixed
     */
    public function indexAction(){
        $title = "登陆";
        $this->view->setVar('title',$title);
        if($this->request->isPost()){
            $post = $this->request->getPost();
            if(empty($post['adminUser']) || empty($post['password'])){
                $this->flash->error("用户名或者密码不能为空");
            }
            //检测
            $date = $this->checkAction($post);
            if($date['date'] == 'success'){
                //登陆成功
                $this->session->set("user_info",$date['user_info']);
//                $this->flash->success($data['msg']);
                //加入系统登陆日记
                //跳转
//                return $this->response->redirect('index/index');
            }else{

                //登陆失败
//                return $this->flash->error($data['msg']);
            }
            return json_encode($date);
        }
    }

    /**
     *登陆验证
     */
    public function checkAction($data){
        $password = $data['password'];
        $user = $data['adminUser'];
        $data = ['date'=>'error', 'msg'=> "用户名或者密码错误",'userId'=>''];
        $info = FatAdminUser::findFirst(['conditions'=> "adminUser = '".$user."' and password = '".$password."'"]);
        if(!empty($info)){
            $data['date'] = 'success';
            $data['msg'] = '验证成功';
            $data['user_info'] = $info ;
        }
        return $data;
    }

    /**
     * 退出登陆
     * @param $userId
     */
    public function outAction(){
        $session = $this->seeison->get('userId');
        //删除session
        if(!empty($session)){
           $this->seeison->remove('userId');
        }
        return $this->reponse->redirect('login/index');
    }
}

