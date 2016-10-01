<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Home\Model;

class IndexController extends Controller {
//    public function __construct(){
//        parent::__construct();
//        $admin=D('Admin');
//        if(!$admin->islogin()){
//            $this->error('请先登录');
//        }
//    }
    public function index(){
        $this->display('index'); 
    }
    public function top(){
        $this->display('top');
    }
    public function left(){
        $menus=C('menus');
        $menu_priv=C('menu_priv');  //多对多关系,利用此为纽带关联
        //var_dump($menus);
        //var_dump($menu_priv);
        
        //只能在栏目下添加内容,所以内容管理下只有有栏目的模型名
        $category_model=M('category');
        $model_id=$category_model->field('model_id')->group('model_id')->select();

        if(!empty($model_id)){
            $model_model=M('model');
            //var_dump($model_id);
            foreach($model_id as $v){
                $model_cnname=$model_model->field('model_name')->where('id='.$v['model_id'])->find();
                //var_dump($model_cnname['model_name']);
                $menus['内容管理'][$model_cnname['model_name']]='/home/content/lst/id/'.$v['model_id'];
                $menu_priv[$model_cnname['model_name']]='contentlist';
            }
            
            C('menus',$menus);
            C('menu_priv',$menu_priv);
        }

        $user_priv=explode(',',$_SESSION['action_list']);
        //var_dump($user_priv);
        //var_dump($menu_priv);
        //var_dump($menus);
        
        //$menus为二维数组.
        foreach($menus as $k => $v){
            //第一层循环 循环顶级的按钮
            //echo $k;
            if(is_array($menu_priv[$k])){
                if(empty(array_intersect($menu_priv[$k],$user_priv))){ //array_intersect返回交集,无交集返回空
                    unset($menus[$k]);  //是数组但是没有交集,就删除整个按钮群,因为一级按钮才会是数组
                    //var_dump($menus[$k]);
                    continue;
                }
            }else{ //不是数组,单个顶级按钮,或者顶级按钮下只有一个二级
                if(!in_array($menu_priv[$k],$user_priv)){  //单个的顶级不在权限
                    unset($menus[$k]);
                    continue;
                }    
            }
            foreach ($v as $k1=>$v1){       //没有考虑$k为空的情况. 为空in_array也为真
                //var_dump($menu_priv[$k1]);
                //var_dump(!in_array($menu_priv[$k1],$user_priv));
                //echo $menu_priv[$k1].'<br/>';
                if(!in_array($menu_priv[$k1],$user_priv)){
                    //echo 111;
                    unset($menus[$k][$k1]);
                    //var_dump($menus[$k1]);
                    continue;
                }
            }
        }
        //var_dump($menus);
        $this->assign('menus',$menus);
        $this->display('left');
    }
    public function main(){
        $this->display('main');
    }
    public function verify(){
        ob_clean();
        $config=array('fontSize' =>80,'length' => 4,'useCurve'=>false);
        $verify = new \Think\Verify($config);
        $verify->entry();
    }
    public function logincheck(){
        $code=I('post.code');
        if(check_verify($code)){
            $this->success('验证码正确');
        }else{
            $this->error('验证码错误');
        }
        
    }
}