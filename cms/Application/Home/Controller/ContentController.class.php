<?php
namespace home\controller;
use think\controller;
use Think\Page;
use Think\Upload;

class ContentController extends Controller{

    public function add(){
        $model_model=M('model');
        $field_model=M('modelfield');
        
        if(empty($_POST['title']) === false){
            $upload=new \Think\Upload();
            $upload->exts=array('jpg','png','gif','jpeg');
            $upload->maxSize=3145728;
            $upload->rootPath="public/";
            $upload->savePath='Uploads/';
            //echo __APP__.'<br/>';
            //echo $upload->rootPath;//exit;
            //var_dump($_FILES);
            $info=$upload->upload();
            //var_dump($info);
            if(!$info){
                echo $upload->getError();
                exit;
            }else{
                $_POST['itpic']=$info['itpic']['savepath'].$info['itpic']['savename'];
            }

            foreach($_POST as $k=>$v){
                if(is_array($v)){
                    //echo $k;
                    $_POST[$k]=implode(',',$v);
                }
            }
            //var_dump($_POST);exit;
            $rules=array(
                array('title','require','标题不能为空',1,'regex'),
                array('type_id','require','主栏目不能为空',1,'regex'),
            );
            $arch_model=M('archives');
            $table_name=$model_model->field('table_name')->where('id='.$_POST['model_id'])->find();
            echo $table_name;
            $table_name=$table_name['table_name'];
            //$c='admin';
            //$model=M($C);
            $table_model=M($table_name);
            if($arch_model->validate($rules)->create()){
                if($field_id=$arch_model->add()){
                    $_POST['aid']=$field_id;
                    if($table_model->create()){
                        if($table_model->add()){
                            $this->success('添加内容成功','lst/id/'.$_POST['model_id']);
                        }else{
                            $this->error('内容添加失败');
                        }
                    }else{
                        
                    }
                }else{
                    $this->error('基本内容添加失败,'.$error_data);
                } 
            }else{
                $this->error($field_model->getError());
            }
        }else{
            //var_dump($_GET);
            $cate_model=D('category');
            $fields=$field_model->where($_GET)->select();

            $data=$cate_model->where($_GET)->select();
            $cate_data=$cate_model->sort($data);
            $this->assign('fields',$fields);
            $this->assign('cate_data',$cate_data);
            $this->display();
        }
    }
    
    public function lst($id){
        $arch_model=M('archives');
//        $field_model=M('modelfield');
//        echo $id;
//        $data['model_id']=$id;
//        $field_th=$field_model->field('field_cnname')->where($data)->select();
        $data['model_id']=$id;

        
        $count=$arch_model->where($data)->count();
        $page=new Page($count,2);
        
        $archdata=$arch_model->where($data)->limit($page->firstRow.','.$page->listRows)->select();

        $showpage=$page->show();
        $this->assign('showpage',$showpage);
        $this->assign('archdata',$archdata);
        $this->display();
    }
    
    public function del(){
        $arch_model=M('archives');
        $model_model=M('model');
        $table_name=$model_model->field('table_name')->find($_GET['id']);
        $model=M($table_name['table_name']);
        if($arch_model->delete($_GET['id']){
            if($model->where('aid='.$_GET['id'])->delete()){
                $this->success('删除成功',U('lst','id='.$_GET['id']));
            }else{
                $this->error('删除详细信息失败');
            }
        }else{
            $this->error('删除基本信息失败');
        }   
    }
//    public function up(){
//        var_dump($_FILES);
//    }


}
