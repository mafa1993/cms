<?php
namespace Home\Model;
use Think\Model;

class CategoryModel extends Model{
    
    public function sort($data,$parent_id=0,$level=0){
        static $category=array();
        foreach ($data as $k => $v){
            if($v['parent_id']==$parent_id){
                $v['level']=$level; 
                $category[]=$v;
                unset($data[$k]);
                $this->sort($data,$v['id'],$level+1); //level值增加要写在里面,最外层会循环所有数据,每次加一,新增的数据level会增加
            }
        }
        return $category;
    }
    
}