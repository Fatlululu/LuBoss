<?php
/*
 * 登陆控制器
 * */
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model;

class LoginController extends ControllerBase{

    /**
     * 登陆
     * @return mixed
     */
    public function indexAction(){
        if($this->request->isPost()){
            $post = $this->request->getPost();
            if(empty($post['adminUser']) || empty($post['adminPassword'])){
                $this->flash->error("用户名或者密码不能为空");
            }
            //检测
            $data = $this->checkAction($post);
            if($data['date'] == 'success'){
                //登陆成功
                $this->session->get("userId",$data['userId']);
                $this->flash->success($data['msg']);
                //加入系统登陆日记
                return $this->response->redirect('index');
            }else{
                //登陆失败
                $this->flash->error($data['msg']);
            }

        }
    }

    /**
     *登陆验证
     */
    public function checkAction($data){
        $password = $data['adminPassword'];
        $user = $data['adminUser'];
        $data = ['date'=>'error', 'msg'=> "用户名或者密码错误",'userId'=>''];
        $info = FatAdminUser::findFirst(['conditions'=> "adminUser = '".$user."' and password = '".$password."'"]);
        if(!empty($info)){
            $data['date'] = 'success';
            $data['msg'] = '验证成功';
            $data['userId'] = '验证成功';
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

        return $this->reponse->redirect('login/index');
    }
}

