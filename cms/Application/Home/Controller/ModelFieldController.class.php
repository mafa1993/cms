<?php
namespace home\controller;
use think\controller;
use Think\Page;

class ModelFieldController extends Controller{

    public function add(){
        if(empty($_POST['field_enname']) === false){
            $rules=array(
                array('field_enname','require','字段英文名不能为空',1,'regex'),
                array('field_cnname','require','字段中文名不能为空',1,'regex'),
                array('field_type','require','字段类型不能为空',1,'regex'),
                array('model_id','require','模型id不能为空',1,'regex'),
                array('field_enname','','英文名不能重复',1,'unique')
            );
            $field_model=M('modelfield');
            $model_model=M('model');
            if($field_model->validate($rules)->create()){
                if($field_model->add()){
                    $table_name=$model_model->field('table_name')->find($_POST['model_id']);
                    $sql='alter table `it_'.$table_name['table_name'].'` add `'.$_POST['field_enname'].'` ';
                    //enum('single', 'mult', 'radio', 'checkbox', 'float	option int html image
                    switch($_POST['field_type']){
                        case 'single':
                        case 'radio':
                        case 'checkbox':
                        case 'option':
                        case 'image':
                            $sql.='varchar(150) not null default \'\'';
                            break;
                        case 'mult':
                            $sql.='varchar(600) not null default \'\'';
                            break;       
                        case 'float':
                            $sql.='float not null default 0.0';
                            break;
                        case 'int':
                            $sql.='int not null default 0';
                            break;
                        default:
                            $this->error('类型错误');    
                    }
                    //echo $sql;
                    if($field_model->execute("$sql") !== false){
                        $this->success('添加成功','lst/id/'.$_POST['model_id']);
                    }else{
                        $this->error('创建字段失败');
                    }
                }else{
                    $this->error('添加字段失败');
                }
            }else{
                $this->error($field_model->getError());
            }
        }else{
            $this->display();
        }
    }
    
    public function lst(){
        $field_model=M('modelfield');
        $data['model_id']=$_GET['id'];
        $count=$field_model->where($data)->count();
        $page=new Page($count,2);
        
        $fielddata=$field_model->where($data)->limit($page->firstRow.','.$page->listRows)->select();

        $showpage=$page->show();
        $this->assign('showpage',$showpage);
        $this->assign('fielddata',$fielddata);
        $this->display();
    }
    
    public function del(){
        $field_model=M('modelfield');
        $model_model=M('model');
        $table_name=$model_model->field('table_name')->find($_GET['model_id']);
        $field_name=$field_model->field('field_enname')->find($_GET['id']);
        $sql='alter table `it_'.$table_name['table_name'].'` drop column '.$field_name['field_enname'];
        if($model_model->execute($sql) === 0){
            if($field_model->delete($_GET['id'])){
                $this->success('删除成功',U('lst'));
            }else{
                $this->error('删除记录失败');
            }
        }else{
            $this->error('删除字段失败');
        }   
    }
    


}
