<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/thinkphp/Public//css/init.css" />
	<script type="text/javascript" >
		function showTime(){
			var time=new Date();
			var year=time.getFullYear();
			var month=time.getMonth()+1;
			var day=time.getDate();
			var hours=time.getHours();
			var minutes=time.getMinutes();
			var seconds=time.getSeconds();
			document.all.show.innerHTML=""+year+"年"+month+"月"+day+"日 "+hours+":"+minutes+":"+seconds;
			//一秒刷新一次显示时间
			var time=setTimeout(showTime,1000);
		}
	</script>
	<style type="text/css">
	/*top部分*/
		#top{
			width: 1280px;
			height: 110px;
			background-color: white;
			overflow: hidden;
		}
		#logo{
			width: 240px;
			height: 80px;
			margin: 22px 0 0 240px;
			float: left;
		}
		#top p{
			font-size: 23px;
			font-weight: bold;
			font-family: '黑体';
			color: gray;
			font-style: italic;
			margin: 65px 5px;
			float: left;
		}
		#motto{
			width: 280px;
			height: 80px;
			margin-right: 240px;
			margin-top: 13px;
			float: right;
		}
		/*导航*/
		#nav{
			background:url('/thinkphp/Public//images/banner.png');
			width: 1280px;
			height: 38px;
			margin:3px 0;
		}
		ul{
			width: 500px;
			height: 38px;
			margin: 0 auto;
			overflow: hidden;
		}
		li{
			background: url('/thinkphp/Public//images/nav_line.png') no-repeat right;
			width: 92px;
			height: 38px;
			text-align: center;
			float: left;
		}
		li a{
			font-size: 18px;
			line-height: 38px;
			color: white;
			display: block;
		}
		li a:hover{
   			 background: url("/thinkphp/Public//images/nav_hover.png");
		}
		/*时间条*/
		#time{
			width: 1280px;
			height: 30px;
			background: url('/thinkphp/Public//images/time_line.png');
		}
		#time div{
			height: 30px;
			width: 800px;
			margin: 0 auto;
			overflow: hidden;
		}
		#time div p{
			float: left; 
			line-height: 30px;
			font-size: 14px;
		}
		#time div div{
			width: 40px;
			float: right; 
			line-height: 30px;
			font-size: 14px;
		}

	</style>
	<title>潍坊学院公寓管理系统</title>
</head>
<body onload="showTime()">
	<div id='top'>
		<div id='logo'>
			<img src="/thinkphp/Public//images/index_logo.png">
		</div>
		<p>公寓管理系统</p>
		<div id='motto'>
			<img src="/thinkphp/Public//images/index_motto.png">
		</div>
	</div>
	<div id='nav'>
		<ul>
			<li><a href="#" target='main' >首&nbsp;&nbsp;页</a></li>
			<li><a href="#" target='main' >信息管理</a></li>
			<li><a href="#" target='main' >报修登记</a></li>
			<li><a href="#" target='main' >来访登记</a></li>
			<li><a href="#" target='main' >物品出楼</a></li>
		</ul>
	</div>
	<div id='time'>
		<div>
		<p id='show'>2011年1月1日</p>
		<div><a href="#">退&nbsp;出</a></div>
		</div>
	</div>
</body>
</html>