<?php

require("../common/public_function.php");

$phone = $_POST['phone'];
$passwd = $_POST['passwd'];

if('POST' == $_SERVER['REQUEST_METHOD']){


	$dbc = mysqli_connect("localhost","root","xlghl123.com","helloworld") or die("连接数据库失败");

	$query = "select phone,salt,password from hello_user where phone=$phone;";

	$result = mysqli_query($dbc,$query) or die("执行查询失败");

	$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

	mysqli_close($dbc);

	$passwd = saltPasswd($passwd,$res['salt']);

	if($phone === $res['phone'] && $passwd === $res['password'] )
	{
		echo '<script language="JavaScript">;alert("登录成功！");location.href="http://test.helloworld.com/";</script>;';

	}else{

		echo '<script language="JavaScript">;alert("登录失败！");location.href="http://test.helloworld.com/";</script>;';

	}
}

