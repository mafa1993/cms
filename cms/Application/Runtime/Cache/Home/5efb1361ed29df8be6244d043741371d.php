<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/Public/css/skin.css" />
    <script type="text/javascript" src="/Public/js/jquery.js"></script>
</head>
    <body>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <!-- 头部开始 -->
            <tr>
                <td width="17" valign="top" background="/Public/images/mail_left_bg.gif">
                    <img src="/Public/images/left_top_right.gif" width="17" height="29" />
                </td>
                <td valign="top" background="/Public/images/content_bg.gif">
                    <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" background="/Public/images/content_bg.gif">
                        <tr><td height="31"><div class="title">添加字段</div></td></tr>
                    </table>
                </td>
                <td width="16" valign="top" background="/Public/images/mail_right_bg.gif"><img src="/Public/images/nav_right_bg.gif" width="16" height="29" /></td>
            </tr>
            <!-- 中间部分开始 -->
            <tr>
                <!--第一行左边框-->
                <td valign="middle" background="/Public/images/mail_left_bg.gif">&nbsp;</td>
                <!--第一行中间内容-->
                <td valign="top" bgcolor="#F7F8F9">
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <!-- 空白行-->
                        <tr><td colspan="2" valign="top">&nbsp;</td><td>&nbsp;</td><td valign="top">&nbsp;</td></tr>
                        <tr>
                            <td colspan="4">
                                <table>
                                    <tr>
                                        <td width="100" align="center"><img src="/Public/images/mime.gif" /></td>
                                        <td valign="bottom"><h3 style="letter-spacing:1px;">在这里，您可以根据您的需求，填写网站参数！</h3></td>
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
                        <!-- 添加栏目开始 -->
                        <tr>
                            <td width="2%">&nbsp;</td>
                            <td width="96%">
                                <table width="100%">
                                    <tr>
                                        <td colspan="2">
                                            <form action="/index.php/Home/ModelField/add" method="post">
                                                <table width="100%" class="cont">
                                                    <tr>
                                                        <td width="2%">&nbsp;</td>
                                                        <td>字段中文名：</td>
                                                        <td width="80%"><input class="text" type="text" name="field_cnname" value="" /></td>                                                       
                                                    </tr>
                                                    <tr>
                                                        <td width="2%">&nbsp;</td>
                                                        <td>字段英文名：</td>
                                                        <td width="80%"><input class="text" type="text" name="field_enname" value="" /></td>                                                       
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>字段类型</td>
                                                        <td>
                                                           <input  type="radio" name="field_type" value="single" />单行文本<br/>
                                                           <input  type="radio" name="field_type" value="int" />整数<br/>
                                                           <input  type="radio" name="field_type" value="float" />小数<br/>
                                                           <input  type="radio" name="field_type" value="radio" />单选框<br/>
                                                           <input  type="radio" name="field_type" value="checkbox" />复选框<br/>
                                                           <input  type="radio" name="field_type" value="option" />下拉列表<br/>
                                                           <input  type="radio" name="field_type" value="mult" />多行文本<br/>                                                        
                                                        </td>
                                                        
                                                    </tr>
                                                     <tr>
                                                        <td>&nbsp;</td>
                                                        <td>字段默认值</td>
                                                        <td>
                                                           <textarea name="field_value"></textarea>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td ><input class="btn" type="submit" value="提交" /></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                                <input type="hidden" name="model_id" value="<?php echo $_GET['id']?>"/>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="2%">&nbsp;</td>
                        </tr>
                        <!-- 添加栏目结束 -->
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
                                <img src="/Public/images/icon_mail.gif" width="16" height="11"> 客户服务邮箱：rainman@foxmail.com<br />
                                <img src="/Public/images/icon_phone.gif" width="17" height="14"> 官方网站：<a href="http://www.rain-man.cn">http://www.rain-man.cn</a>
                            </td>
                            <td>&nbsp;</td><td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td background="/Public/images/mail_right_bg.gif">&nbsp;</td>
            </tr>
            <!-- 底部部分 -->
            <tr>
                <td valign="bottom" background="/Public/images/mail_left_bg.gif">
                    <img src="/Public/images/buttom_left.gif" width="17" height="17" />
                </td>
                <td background="/Public/images/buttom_bgs.gif">
                    <img src="/Public/images/buttom_bgs.gif" width="17" height="17">
                </td>
                <td valign="bottom" background="/Public/images/mail_right_bg.gif">
                    <img src="/Public/images/buttom_right.gif" width="16" height="17" />
                </td>           
            </tr>
        </table>
    </body>
</html>
<script>
$(".menus").click(function(){
    //选择自己的状态，
    var attrs = $(this).attr("checked");
    //要选择该权限对应的子权限对应的复选框。
    $(this).parent().parent().find(".submenus").attr("checked",attrs);
  //  $(".submenus").attr("checked",attrs);
});

$(".submenus").click(function(){
    if($(this).attr('checked')){
    //只有当前复选框被选中时，才执行如下代码
        $(this).parent().parent().parent().find("input:first").attr('checked','checked');
    }
    $(this).parent().parent().find(".submenus").each(function(){
        if($(this).attr('checked')){
            var flag=true;
           // break;
        }});
        if(!flag){
            $(this).parent().parent().parent().find("input:first").attr('checked','false');
        }
});
</script>