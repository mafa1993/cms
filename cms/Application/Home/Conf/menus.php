<?php
//如果不识别中文,则键名只能用英文,然后再设置一个数组,进行语言转换
//用来输出按钮的,删除不需要按钮,所以不写
return array(
    'menus'=>array(
        '管理员管理'=>array(
            '添加管理员'=>'/home/privilege/add',
            '管理员列表'=>'/home/privilege/lst',
        ),
        '栏目管理'=>array(
            '添加栏目'=>'/home/category/add',
            '栏目列表'=>'/home/category/lst',        
        ),
        '模型管理'=>array(
            '添加模型'=>'/home/model/add',
            '模型列表'=>'/home/model/lst',    
        ),
        '内容管理'=>array(),
    ),
    'menu_priv'=>array(
        '管理员管理'=>array('addadmin','updateadmin','adminlist'),
        '添加管理员'=>'addadmin',
        '修改管理员'=>'updateadmin',
        '管理员列表'=>'adminlist',
        '栏目管理'=>array('addcategory','updatecategory','categorylist'),
        '添加栏目'=>'addcategory',
        '修改栏目'=>'updatecategory',
        '栏目列表'=>'categorylist',
        '模型管理'=>array('addmodel','updatemodel','modellist'),
        '添加模型'=>'addmodel',
        '修改模型'=>'updatemodel',
        '模型列表'=>'modellist',
        '内容管理'=>'contentlist',
    )

);
//用于按钮与权限替换
//$menu_priv=array(
//    '管理员管理'=>array('addadmin','updateadmin'),
//    '添加管理员'=>'addadmin',
//    '修改管理员'=>'updateadmin',
//    '栏目管理'=>array('addcategory','updatecategory'),
//    '添加栏目'=>'addcategory',
//    '修改栏目'=>'updatecategory'
//);
//
//return array(
//    'menus1='=>$menus1,
//    //'menu_priv'=>$menu_priv
//
//);