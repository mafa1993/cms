<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/Public/Style/skin.css" />
    <!--script type="text/javascript" language="javascript" src="/Public/Js/jq.js"></script>
    <script>
        function selectAll(form) {
            var obj = document.getElementsByName('selectall');
            var cks = document.getElementsByTagName("input");
            var ckslen = cks.length;
            for(var i=0;i<ckslen-1;i++) {
                if(cks[i].type == 'checkbox') {
                    cks[i].checked = obj[0].checked;
                }
            }
        }
        window.onload=selectAll;
    </script-->
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
                                        <form method="GET" action="/index.php/Home/Privilege/lst">
                                        管理员名称：<input type="text" name="username" value="<?php echo $_GET['username'];?>" /><input type="submit" value="搜索" />
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
                                            <form action="/index.php/Home/Privilege/bdel" method="post" onsubmit="return confirm('确定要删除吗？');">
                                                <table width="100%"  class="cont tr_color">
                                                    <tr>
                                                        <th>多选</th>
                                                        <!--/index.php/Home/Privilege/lst:只到方法名:
															/index.php/Home/Privilege/lst?username=:包含当前地址后面的参数  -->
                                                        <th>序号</th>
                                                        <th>角色名称</th>
                                                        <th>权限列表</th>
                                                        <th>操作</th>
                                                    </tr>
                                                   <?php $i=1; foreach ($data as $k => $v): ?>
                                                    <tr align="center" class="d">
                                                        <td><input name="ids[]" class="delids" type="checkbox" value="<?php echo $v['id']; ?>" /></td>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $v['username']; ?></td>
                                                        <td><?php echo $v['action_list']; ?></td>
                                                        <td>
                                                        <a href="/index.php/Home/Privilege/edit/id/<?php echo $v['id'];$i++; ?>/p/<?php echo $_GET['p']?>">修改</a> 
                                                        <a onclick="return confirm('确定要删除吗？');" href="/index.php/Home/Privilege/del/id/<?php echo $v['id']; ?>/p/<?php echo $_GET['p']?>">删除</a></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                   <tr>
                                                   <td><input type="submit" value="删除所选" /></td>
                                                   	<td colspan="4" align="center"><?php echo $showpage; ?></td>
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