<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/Public/Style/skin.css" />
    <script type="text/javascript" language="javascript" src="/Public/Js/jq.js"></script>
</head>
    <body>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <!-- 头部开始 -->
            <tr>
                <td width="17" valign="top" background="/Public/Images/mail_left_bg.gif">
                    <img src="/Public/Images/left_top_right.gif" width="17" height="29" />
                </td>
                <td valign="top" background="/Public/Images/content_bg.gif">
                    <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" background="././Images/content_bg.gif">
                        <tr><td height="31"><div class="title">添加栏目</div></td></tr>
                    </table>
                </td>
                <td width="16" valign="top" background="/Public/Images/mail_right_bg.gif"><img src="/Public/Images/nav_right_bg.gif" width="16" height="29" /></td>
            </tr>
            <!-- 中间部分开始 -->
            <tr>
                <!--第一行左边框-->
                <td valign="middle" background="/Public/Images/mail_left_bg.gif">&nbsp;</td>
                <!--第一行中间内容-->
                <td valign="top" bgcolor="#F7F8F9">
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <!-- 空白行-->
                        <tr><td colspan="2" valign="top">&nbsp;</td><td>&nbsp;</td><td valign="top">&nbsp;</td></tr>
                        <tr>
                            <td colspan="4">
                                <table>
                                    <tr>
                                        <td width="100" align="center"><img src="/Public/Images/mime.gif" /></td>
                                        <td valign="bottom">
                                        
                                        
                                        </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- 一条线 -->
                        <tr>
                            <td height="40" colspan="4">
                                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                                    <tr><td></td></tr>
                                </table>
                            </td>
                        </tr>
                        <!-- 产品列表开始 -->
                        <tr>
                            <td width="2%">&nbsp;</td>
                            <td width="96%">
                                <table width="100%">
                                    <tr>
                                        <td colspan="2">
                                            <form action="/index.php/Home/Category/bdel" method="POST" onsubmit="return confirm('确定要删除吗？');">
                                                <table width="100%"  class="cont tr_color">
                                                    <tr>
                                                        <th>全选</th>
                                                        <!--/index.php/Home/Category/lst:只到方法名:
															/index.php/home/category/lst:包含当前地址后面的参数  -->
                                                        <th>栏目的名称</th>
                                                        <th>操作</th>
                                                    </tr>
                                                   <?php foreach ($data as $k => $v): ?>
                                                    <tr <?php ?> level="<?php echo $v['level']; ?>" align="center" class="d">
                                                        <td><input name="ids[]" class="delids" type="checkbox" value="<?php echo $v['id']; ?>" /></td>
                                                        <td align="left">
                                                        
                                                        <?php echo str_repeat('--', $v['level'] * 2) . $v['cat_name']; ?></td>
                                                        <td>
                                                        <a href="/index.php/Home/Category/edit/id/<?php echo $v['id']; ?>">修改</a> 
                                                        <a onclick="return confirm('确定要删除吗？');" href="/index.php/Home/Category/del/id/<?php echo $v['id']; ?>">删除</a></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                   <tr>
                                                   <td colspan="2"><input type="submit" value="删除所选" /><td><a href="/index.php/Home/Category/add" align='center'>添加</a></td>
                                                   </tr>
                                                </table>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="2%">&nbsp;</td>
                        </tr>
                        <!-- 产品列表结束 -->
                        <tr>
                            <td height="40" colspan="4">
                                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                                    <tr><td></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="2%">&nbsp;</td>
                            <td width="51%" class="left_txt">
                                <img src="/Public/Images/icon_mail.gif" width="16" height="11"> 客户服务邮箱：rainman@foxmail.com<br />
                                <img src="/Public/Images/icon_phone.gif" width="17" height="14"> 官方网站：<a href="http://www.rain-man.cn">http://www.rain-man.cn</a>
                            </td>
                            <td>&nbsp;</td><td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td background="/Public/Images/mail_right_bg.gif">&nbsp;</td>
            </tr>
            <!-- 底部部分 -->
            <tr>
                <td valign="bottom" background="/Public/Images/mail_left_bg.gif">
                    <img src="/Public/Images/buttom_left.gif" width="17" height="17" />
                </td>
                <td background="/Public/Images/buttom_bgs.gif">
                    <img src="/Public/Images/buttom_bgs.gif" width="17" height="17">
                </td>
                <td valign="bottom" background="/Public/Images/mail_right_bg.gif">
                    <img src="/Public/Images/buttom_right.gif" width="16" height="17" />
                </td>           
            </tr>
        </table>
    </body>
</html>
<script>
//
//// 选出所有的a标签绑定click事件
//$(".zd").click(function(){
//	// 先取出所在的tr
//	var tr = $(this).parent().parent();
//	// 取出当前行的level值
//	var level = parseInt(tr.attr("level"));
//	if($(this).html() == '[-]')
//	{
//		// 把所有的子类折叠起来
//		// 取出后面所有的TR
//		tr.nextAll("tr").each(function(k, v){
//			$(this).find(".zd").html("[+]");
//			if(parseInt($(this).attr("level")) > level)
//			{
//				$(this).hide();
//			}
//			else
//				return false; // 直到一个LEVEL和当前LEVEL值相同的TR就退出循环
//		});
//		$(this).html('[+]');
//	}
//	else
//	{
//		// 把所有的子类折叠起来
//		// 取出后面所有的TR
//		tr.nextAll("tr").each(function(k, v){
//			if(parseInt($(this).attr("level")) == level+1)
//			{
//				$(this).show();
//			}
//			else
//				return false; // 直到一个LEVEL和当前LEVEL值相同的TR就退出循环
//		});
//		$(this).html('[-]');
//	}
//});
</script>