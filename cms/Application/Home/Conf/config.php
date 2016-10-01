<?php
return array(
	//'配置项'=>'配置值'
    APP_DEBUG=>true ,
    SHOW_PAGE_TRACE => 'true',

    DB_FIELD_CACHE=>false ,

    HTML_CACHE_ON=>false,
    
    //PDO连接方式
    DB_TYPE   => 'mysql', // 数据库类型
    DB_USER   => 'root', // 用户名
    DB_PWD    => '', // 密码
    DB_PREFIX => 'it_', // 数据库表前缀 
    DB_DSN    => 'mysql:host=localhost;dbname=itcms;charset=UTF8',

    LOAD_EXT_CONFIG => 'privilege,menus',      //添加额外的配置文件

);