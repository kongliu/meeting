<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
</head>
<body>

<h2><center>后台管理系统登录</center></h2>
<form action="__APP__/Login/login" name="loginForm" method="post">
<table border="0" cellpadding="0" cellspacing="0" style="font-size:12px;margin:0 auto;">

<?php if($error == 1): ?><tr><td colspan="3" height="30" style="color:#FF0000">账户密码错误！</td></tr><?php endif; ?>

<?php if($error == 2): ?><tr><td colspan="3" height="30" style="color:#FF0000">验证码错误！</td></tr><?php endif; ?>

<tr>
	<td height="30" width="50">账号：</td>
    <td><input type="text" id="account_input" name="account" size="30" maxlength="30" style="width:200px;" /></td>
    <td>&nbsp;</td>
</tr>

<tr>
	<td height="30"d width="50">密码：</td>
    <td><input type="password" id="password_input" name="password" size="30" maxlength="30" style="width:200px;" /></td>
    <td>&nbsp;</td>
</tr>

<tr>
	<td height="30" width="50">校验码：</td>
    <td><input type="text" id="verify_input" name="verify" size="10" maxlength="10" style="width:100px;" /></td>
    <td><img id="verifyImg" src="__APP__/Login/verify/" onclick="fleshVerify()" style="cursor:pointer" title="看不清？点击换一张！" /></td>
</tr>

<tr><td height="30" width="50">&nbsp;</td><td><input type="submit" value="登 录" /></td><td>&nbsp;</td></tr>

</table>
</form>

<script type="text/javascript">
function fleshVerify()
{
	var time = new Date().getTime();
	document.getElementById('verifyImg').src = "__APP__/Login/verify/" + time;
}
</script>

</body>
</html>