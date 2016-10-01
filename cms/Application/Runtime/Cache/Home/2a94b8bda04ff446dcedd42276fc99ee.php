<?php if (!defined('THINK_PATH')) exit();?><head>
    <title>瑞曼科技 - 网站后台管理中心</title>
</head>
<frameset rows="64,*"  frameborder="no" border="0" framespacing="0">
    <!--头部-->
    <frame src="<?php echo U('index/top');?>" name="top" noresize="noresize" frameborder="0"  scrolling="no" marginwidth="0" marginheight="0" />
    <!--主体部分-->
    <frameset cols="185,*">
        <!--主体左部分-->
        <frame src="/index.php/Home/Index/left" name="left" noresize="noresize" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" />
        <!--主体右部分-->
        <frame src="/index.php/Home/Index/main" name="main" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" />
</frameset>
</html>