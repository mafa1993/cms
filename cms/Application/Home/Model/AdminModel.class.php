<?php
namespace Home\Model;
use Think\Model;

class AdminModel extends Model{

    public function login($username,$password){
        $data['username']=$username;
        $user=$this->where($data)->find();  //where("username='$username'") 值要加引号
        //echo md5(md5($password).$user['salt']);exit;
        if(!empty($user)){
            if($user['password']==md5(md5($password).$user['salt'])){
                session('username',$username);
                session('id',$user['id']);
                session('action_list',$user['action_list']);
                echo $_SESSION['username'];
                return true;
            }
        }
        return false;
    }
    
    public function logout(){     //登出操作，制空session就可
        session(null);
    }
    
    public function islogin(){
        return (isset($_SESSION['id']));
    }
}
?>