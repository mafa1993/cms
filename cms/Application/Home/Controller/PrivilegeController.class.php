<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Home\Controller\CheckprivController;


class privilegeController extends Controller{
    
    public $check_priv;
    public function __construct(){
        parent::__construct();
        $this->check_priv=A('Checkpriv');
    }
    public function add(){

        //var_dump($this->check_priv);
        $this->check_priv->check('addadmin');
        if(isset($_POST['submit'])){
            $rule=array(                //自动验证
                array('username','require','用户名不能为空',1,'regex'),
                array('action_list','require','必须分配权限',1,'regex'),
                array('username','','用户名重复',1,'unique')
            );
            unset($_POST['submit']);
            $_POST['action_list']=implode(',',$_POST['action_list']); //接受到的为数组，转换为字符串才可以
            $auto=array(                     //自动完成password和salt字段，默认都为123456
                array('password',md5(md5(123456).'123456')),
                array('salt',123456)
            );
            $admin_model=M('admin');
            if($admin_model->validate($rule)->create()){        //先验证才能使用添加
                $admin_model->auto($auto)->create();
                if($admin_model->add()){
                    $this->success('添加用户：'.$_POST['username'].'成功','add',3);
                }else{
                    $this->error('添加失败');
                }
            }else{
                $this->error($admin_model->getError());
            }
        }else{
            $this->assign('pri',C('priv_list'));
            $this->display();
        }

        
    }
    
    public function lst(){
        $admin_model=M('admin');
        $username=I('get.username');
        if($username==0){
            $where['username']=array('like','%'.I('get.username').'%');
        }elseif(empty($username)){           
            $where=1;
            unset($where['username']);

        }else{
            $where['username']=array('like','%'.I('get.username').'%'); 
        }
        $count=$admin_model->where($where)->count();
        $page=new \Think\Page($count,5);
        $data=$admin_model->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $showpage=$page->show();

        $this->assign('data',$data);
        $this->assign('showpage',$showpage);
        $this->display();
    }
    
    public function del($id){
        //$check_priv->check('updateadmin');
        //$check_priv->check('adminlist');
        $p=I('get.p');
        $admin_model=M('admin');
        if($admin_model->delete($id)){
            $this->success('删除成功',U('privilege/lst','p='.$p));
        }
    }
    
    public function bdel(){
        //$check_priv->check('updateadmin');
        //$check_priv->check('adminlist');
        $p=I('get.p');
        $users=I('post.ids');
        $users=implode(',',$users);
        $rule['id']=array('in',$users);
        $adminmodel=M('admin');
        if(empty($users)){
            $this->redirect('lst','请选择',3);
        }elseif($adminmodel->where($rule)->delete()){
            $this->success('删除成功','lst','p='.$p);
        }else{

            $this->error('删除失败');
        }
    }
    
    public function edit($id=0){
        //$check_priv->check('updateadmin');
        $rule=array(                //自动验证  执行修改操作 不用验证用户名重复
                array('username','require','用户名不能为空',1,'regex'),
                array('action_list','require','必须分配权限',1,'regex'),
            );
        if(empty(I('get.id'))){ //没有传递id 则为修改自己的
            $id=session('id');
        }

         //$_POST[]=$_GET['id'];
        $adminmodel=M('admin');
        if(!empty($_POST['username'])){
            $_POST['action_list']=implode(',',$_POST['action_list']);
            $data=$adminmodel->validate($rule)->create();
            
            //进行用户名唯一检测
            $rul['username']=$_POST['username'];
            $user_ids=$adminmodel->where($rul)->field('id')->select();
            $count=count($user_ids);
            if($coun>1){
                $this->error('用户名重复');
            }elseif($count==1){
                if($user_ids[0]['id']!=$id){
                    $this->error('用户名重复');
                }
            }
            if($data){
                //echo $id;exit;
                $adminmodel->where('id='.$id)->save();
//
//                if($id==session('id')){
//                    $action_list=$adminmodel->field('action_list')->find($id);
//                    session('action_list',$action_list['action_list']);
//                    $index=A('index');
//                    $this->redirect('index/index');
//                }
                $this->success('修改成功',U('lst','p='.I('get.p')));
            }else{
                if(APP_DEBUG == ture){
                    echo $adminmodel->getError();
                }else{
                    echo '发生未知错误';
                }
            }
        }else{
            $info=$adminmodel->field('username,action_list')->find($id);
            $pri=explode(',',$info['action_list']);
            $this->assign('username',$info['username']);
            $this->assign('_pri',$pri);
            $this->assign('pri',C('priv_list'));
            $this->display();
        }
        
    }
    

}