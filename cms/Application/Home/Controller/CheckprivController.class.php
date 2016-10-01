<?php
namespace  Home\Controller;
use Think\Controller;

class CheckprivController extends Controller{ 
    
    public function check($priv){
        
        $user__priv=session('action_list');
        //echo $user__priv;
        if(stripos(','.$user__priv.',',','.$priv.',') === false){
            $this->error('没有权限');
            exit;
        }
        
    }
}