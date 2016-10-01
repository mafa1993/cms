<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class LoginController extends Controller{
    public function login(){
        if(!isset($_POST['submit'])){
            $this->display();
        }else{
            $adminmodel=D('admin');
            $code=I('post.authCode');
            if(!$this->check_verify($code)){
                $this->error('验证码错误');
            }elseif($adminmodel->login(I('post.username'),I('post.password'))){
                $this->redirect('Index/index','',0); 
            }else{
                $this->error('账号密码错误');
            }
        }
    }
    
    public function verify(){
        ob_clean();
        $verify=new \Think\Verify();
        $verify->useCurve=false;
        $verify->useNoise=false;
        $verify->fontSize=18;
        $verify->length=4;
        $verify->codeSet='1';
//       $verify->useZh=true;          //Think/Verify/ttfs下没有中文字体文件会报错
//       $verify->zhSet="一二三四五";
        $verify->entry();
    }
    
    public function check_verify($code){
        $verify=new \Think\Verify();
        return $verify->check($code);
    }
}
?>