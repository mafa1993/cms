<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/Public/Style/skin.css" />
    <script type="text/javascript" src="/Public/Js/jq.js"></script>
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
                        <tr><td height="31"><div class="title">添加内容</div></td></tr>
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
                                            <form action="/index.php/Home/Content/add" method="POST" enctype="multipart/form-data">
<input type="hidden" name="model_id" value="<?php echo $_GET['model_id'] ?>" />
                                                <table width="100%" class="cont">
                                                	<tr>
                                                        <td width="2%">&nbsp;</td>
                                                        <td width="20%">所属栏目：</td>
                                                        <td>
   <select name="type_id">
   <option value="">请选择一个栏目</option>
   <?php foreach($cate_data as $k=>$v){ ?>
   <option ><?php echo str_repeat('--',$v['level']).$v['cat_name'];?></option> <?php }?>
   </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%">&nbsp;</td>
                                                        <td width="20%">标题：</td>
                                                        <td><input class="text" type="text" name="title" value="" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%">&nbsp;</td>
                                                        <td width="20%">缩略图：</td>
                                                        <td>
<input type="file" name="itpic" id="itimg" /> <img id="itpic" width="50px" height="50px" />
                                                        </td>
                                                    </tr>
<?php
foreach ($fields as $k => $v): ?>
 <tr>
        <td width="2%">&nbsp;</td>
        <td width="20%"><?php echo $v['field_cnname']; ?>:</td>
        <td>
<?php if($v['field_type'] == 'mult'): ?>
<textarea name="<?php echo $v['field_enname'] ?>"></textarea>
<?php elseif ($v['field_type'] == 'single'): ?>
	<input type="text" name="<?php echo $v['fielde_enname'] ?>" />
<?php elseif ($v['field_type'] == 'checkbox'): $radios = explode(',', $v['field_value']); foreach ($radios as $year):?>
	<input name="<?php echo $v['field_enname'] ?>[]" type="checkbox" value="<?php echo $year; ?>" /> <?php echo $year; ?>
	
	<?php endforeach; ?>
<?php elseif($v['field_type'] == 'radio'): $radios = explode(',', $v['field_value']); foreach ($radios as $year):?>
	<input name="<?php echo $v['field_enname'] ?>" type="radio" value="<?php echo $year; ?>" /> <?php echo $year; ?>
	
	<?php endforeach; ?>
<?php elseif ($v['field_type'] == 'float' || $v['field_type'] == 'int'): ?>
<input type="text" name="<?php echo $v['fielde_enname']; ?>" value="0" />
<?php endif; ?>
        </td>
</tr>
<?php endforeach; ?>
                                                    <tr>
                                                        <td colspan="3"><input class="btn" type="submit" value="提交" /></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="2%">&nbsp;</td>
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

        </form>
    </body>
</html>

<script>
//$("input[name=litpic_btn]").click(function(){
//	$("#sel_image").show();
//});
//$("input[name=image]").change(function(){
//	$("form[name=ajax_upload_image]").submit();
//});
function change(){
	var mypic=document.getElementById('itimg').files[0];
	//window.URL.creatObjectURL(mypic) 获得对象的二进制源码
	document.getElementById('itpic').src=window.URL.createObjectURL(mypic);
}
</script>