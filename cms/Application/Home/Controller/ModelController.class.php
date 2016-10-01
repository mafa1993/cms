<?php
namespace home\controller;
use think\controller;
use Think\Page;

class modelcontroller extends Controller{

    public function add(){
        if(empty($_POST['table_name']) === false){
            $rules=array(
                array('model_name','require','模型名不能为空',1,'regex'),
                array('table_name','require','表名不能为空',1,'regex'),
                array('model_name','','模型名不能重复',1,'unique'),
                array('table_name','','表名不能重复',1,'unique')
            );
            $model_model=M('model');
            if($model_model->validate($rules)->create()){
                if($model_model->add()){
                    $sql='create table `it_'.I('table_name').'`(aid smallint unsigned not null primary key;)engine=myisam default charset=utf8;';
                    
                    if($model_model->execute("$sql") !== false){
                        $this->success('添加成功','lst');
                    }else{
                        $this->error('创建表失败');
                    }
                }else{
                    $this->error('添加模型失败');
                }
            }else{
                $this->error($model_model->getError());
            }
        }else{
            $this->display();
        }
    }
    
    public function lst(){
        $model_model=M('model');
        $count=$model_model->count();
        $page=new Page($count,1);
        $modeldata=$model_model->limit($page->firstRow.','.$page->listRows)->select();

        $showpage=$page->show();
        $this->assign('showpage',$showpage);
        $this->assign('modeldata',$modeldata);
        $this->display();
    }
    
    public function del($id){
        $model_model=M('model');
        if(empty(trim($id)) == false){
            $table_name=$model_model->field('table_name')->find($id);
            $sql='drop table `it_'.$table_name['table_name'].'`;';
            if($model_model->execute($sql) === 0){
                if($model_model->delete($id)){
                    $this->success('删除成功',U('lst'));
                }else{
                    $this->error('删除模型失败');
                }
            }else{
                $this->error('删除表失败');
            }   

        }
    }
    

    public function edit($id){
        $model_model=M('model');
        if(empty($_POST['table_name']) == false){
            $old_tname=$model_model->field('table_name')->find($_POST['id']);
            $sql='alter table `it_'.$old_tname['table_name'].'` rename `it_'.$_POST['table_name'].'`;';
            if($model_model->execute($sql) === 0)
                //唯一性需要写函数自行验证
                $rules=array(
                    array('model_name','require','模型名不能为空',1,'regex'),
                    array('table_name','require','表名不能为空',1,'regex'),
                );
                if($model_model->validate($rules)->create()){
                    if($model_model->save() !== false){
                        $this->success('修改成功','lst');
                    }else{
                        $this->error('添加失败');
                    }
            }else{
                $this->error($model_model->getError());
            }
        }else{
            $data=$model_model->find($id);
            $this->assign('modeldata',$data);
            $this->display();
        }
    }
}
