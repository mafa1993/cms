<?php
namespace Home\Controller;
use Think\Controller;

class CategoryController extends Controller{
    public function add(){
        $cat_model=D('category');
        
        if(I('post.cat_name')){
            $rules=array(
                array('cat_name','require','栏目名不能为空',1,'regex'),
                array('parent_id','require','必须分配权限',1,'regex'),
            );
            if($cat_model->validate($rules)->create()){
                if($cat_model->add()){
                    //echo $cat_model->add()->getLastSql();exit;
                    $this->success('添加栏目成功','lst');
                }else{
                    $this->error('添加失败','lst');
                }
            }else{
                $this->error($cat_model->getError());
            } 
        }else{
            $data=$cat_model->field('id,cat_name,parent_id')->select();
            $model_model=M('model');
            $model_data=$model_model->select();
            $category=$cat_model->sort($data);
            $this->assign('category',$category);
            $this->assign('model_data',$model_data);
            $this->display();
        }
        
    }
    
    public function lst(){
        $cat_model=D('category');
        $data=$cat_model->select();
        $category=$cat_model->sort($data);
        //var_dump($category);
        $this->assign('data',$category);
        $this->display();
    }
    
    public function del($id){
        $cat_model=D('category');
        //echo $id;
        $data=$cat_model->field('id,parent_id')->select();
        //var_dump($data);
        $del_cat=$cat_model->sort($data,$id);
        //var_dump($del_cat);
        $ids=$id;
        if(!empty($del_cat)){
            foreach($del_cat as $v){
                $ids.=','.$v['id'];
            }
        }
        $del_rule['id']=array('in',$ids);
        if($cat_model->where($del_rule)->delete()){
            //echo $cat_model->getLastSql();
            
            $this->success('删除成功',U('category/lst'));
        }else{
            //echo $cat_model->getLastSql();
            $this->error('删除失败',U('category/lst'));
        }
  
    }
    
    //此方法由于模型中静态变量,每次$child_data中都有值,效率低
    public function bdel(){
        $ids=I('post.ids');
        //var_dump($ids);
        $cat_model=D('Category');
        $data=$cat_model->field('id,parent_id')->select();
        
        foreach($ids as $v){
            $ids[]=$v;
            $child_data=$cat_model->sort($data,$v);     //找到$v的所有子集
 
            //var_dump($child_data);
            if(!empty($child_data)){
                //var_dump($child_data);
                foreach($child_data as $v){
                    $ids[]=$v['id'];
                }    
            }
        }
        $arr1=array_flip($ids);
        $ids=array_flip($arr1);

        $ids=implode(',',$ids);
        $del['id']=array('in',$ids);
        if($cat_model->where($del)->delete()){
            $this->success('删除成功',U('category/lst'));
        }else{
            $this->error('删除失败','category/lst');
        }
   
    }
    
    public function edit($id){
        $cat_model=D('category');
        if(!empty($_POST['id'])){
            var_dump($_POST);
             $rules=array(
                array('cat_name','require','栏目名不能为空',1,'regex'),
                array('parent_id','require','必须分配权限',1,'regex'),
             );
             if($cat_model->validate($rules)->create()){
                
                if(($cat_model->save()) !== false){     //什么都不改,会返回0
                    $this->success('修改成功',U('category/lst'));
                }else{
                    echo $cat_model->getLastSql();
                    //$this->error('修改失败');
                }
             }else{
                $this->error($cat_model->getError());
             }
        }else{
            $data=$cat_model->field('id,cat_name,parent_id')->select();
            $category=$cat_model->sort($data);
            $info=$cat_model->find($id);
            $this->assign('data',$category);
            $this->assign('info',$info);
            
            $this->display();
        }
    }
    
    
}