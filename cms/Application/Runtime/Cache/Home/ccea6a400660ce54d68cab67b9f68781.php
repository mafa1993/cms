<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/Public/css/init.css" />
    <script type="text/javascript">
        function freshVerify() {  
        document.getElementById('verify').src='/index.php/Home/Index/verify/'+Math.random();  
        }  
    </script>
	<style type="text/css">
	/*头*/
		#head{
			background-image: url('/Public/images/login_head.png');
			width: 1280px;
			height: 105px;
			overflow: hidden;
		}
		#logo{
			margin: 40px 0px 0px 190px;
			float: left;
		}
		#head p{
			font-size: 23px;
			font-weight: bold;
			font-family: '黑体';
			font-style: italic;
			color: blue;
			margin: 60px 5px;
			float: left;
		}
		/*主体*/
		#body{
			width: 900px;
			height: 310px;
			margin: 10px auto;
			overflow: hidden;
		}
		#body_left{
			border: 1px solid gray;
			border-right: 0px;
			width: 470px;
			height: 240px;
			margin: 35px 0px;
			float: left;
		}
		#body_right{
			border: 1px solid gray;
			background: url("/Public/images/login_login.png");
			width: 426px;
			height: 306px;
			margin: 1px 0px;
			float: left; 
		}
		#body_right p{
			font-size: 24px;
			font-family: '黑体';
			color: gray;
			width: 260px;
			margin: 35px auto 10px;
		}
		/*表单*/
		#f{
			font-size: 24px;
			line-height: 28px;
			width:200px;
			margin: 20px auto;
			overflow: hidden;
		}
        #f img
        {
            display: block;
            float: right;   
            margin-right: 35px;
        }
		hr{
			width: 300px;
			text-align: center;
		}
		#submit{
			display: block;
			width: 78px;
			height: 30px; 
			background: url('/Public/images/login_icon_bg_01.png') no-repeat 0px -30px;
			margin-left: 10px;
			float: left;
		}
		#submit:hover{
			background: url('/Public/images/login_icon_bg_01.png') no-repeat -78px -30px;
		}
		#button{
			font-size: 14px;
			width: 200px;
			height: 30px;
			margin:4px auto;
		}
		/*版权信息*/
		#foot{
			font-size: 14px;
			color: gray;
			width:300px;
			margin: 0 auto;
		}
	</style>
	<title>潍坊学院公寓管理系统</title>
</head>
<body>
	<div id='head'>
		<div id='logo'>
			<img src="/Public/images/login_logo.png" />
		</div>
		<p>公寓管理系统</p>
	</div>
	<div id='body'>
		<div id='body_left'>
			<img src="/Public/images/login_building.png" />
		</div>
		<div id='body_right'>
			<p>用户登陆</p>
			<hr />
			<div id='f'>
				<form action="<?php echo U('index/logincheck');?>"  method='post' name='login'>
					<span>用户名：</span><input type='text' name='username' /> <br/>
					<span>密&nbsp;&nbsp;码：</span><input type='password' name='password' /> <br />
					<span>验证码：</span><input type='text' name='code' size='4'/> <img id='verify' title="点图换码"width="40%" height="25" src="<?php echo U('index/verify');?>" onclick="freshVerify()"/><br />
					<span>&nbsp;&nbsp;&nbsp;</span><input type='radio' name='choice' value='管理员' /><span> 管理员</span>
					<span>&nbsp;&nbsp;&nbsp;</span><input type='radio' name='choice' value='宿管' checked='checked' />  <span>宿管</span>
					<!--input type='button' name='submit' onclick="document.formname.submit()" id='submit' value=' '--> 
					<div id='button'>
						<a href="javascript:document.login.submit()" id='submit'></a>&nbsp;&nbsp;&nbsp;
						<a href="<?php echo U('index/updatepass','','php');?>">修改密码</a>
					</div>
				</form>
		  </div>
	   </div>
  </div>
	<div id="foot">
		<span>&copy;1999-2015<span>版权所有</span>&nbsp;&nbsp;联系电话：xxxxxxxxx</span>
	</div>	
</body>
</html>