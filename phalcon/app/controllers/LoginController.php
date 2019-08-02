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
            $check = $this->checkAction($post);
            if($check['date'] == 'success'){
                //登陆成功
                $this->session->get("userId",$userId);
                $this->flash->success($check['msg']);
                //加入系统登陆日记
                return $this->response->redirect('index');
            }else{
                //登陆失败
                $this->flash->error($check['msg']);
            }

        }
    }

    /**
     *登陆验证
     */
    public function checkAction($data){
        $password = $data['adminPassword'];
        $user = $data['adminUser'];
        $info = FatAdminUser::findFist()
    }

    /**
     * 退出登陆
     * @param $userId
     */
    public function outAction(){

    }
}

