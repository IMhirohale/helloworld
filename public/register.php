<?php

<<<<<<< HEAD
require("../common/public_function.php");

=======
>>>>>>> 58cdf863d58f5b6e02bc63387fbc9b5ac9a07559
$name = $_POST['name'];

$phone = $_POST['phone'];

$passwd = $_POST['passwd'];

$passwdConfirm = $_POST['passwdconfirm'];

if('POST' == $_SERVER['REQUEST_METHOD']){
	
	if(empty($name || !checkName($name))){
		echo '<script language="JavaScript">;alert("用户名不合法或为空");history.back();</script>';
		exit;
	}

	if(empty($phone) || !checkPhone($phone)){
		echo '<script language="JavaScript">;alert("手机号不能为空或格式不正确");history.back();</script>';	
		exit;
	}

	if(empty($passwd)){
		echo '<script language="JavaScript">;alert("密码不能为空");history.back();</script>';
		exit;
	}

	if(empty($passwdConfirm)){
		echo '<script language="JavaScript">;alert("确认密码不能为空");history.back();</script>';
		exit;
	}

	if($passwd !== $passwdConfirm){
		echo '<script language="JavaScript">;alert("密码与确认密码不相等，请检查并重新输入");history.back();</script>';
		exit;	 
	}

	$salt = rand(100000, 999999);

	$passwd = saltPasswd($passwd,$salt);

	$createTime = time();

	$dbc = mysqli_connect("localhost","root","xlghl123.com","helloworld") or die("连接数据库失败");

	$query = "insert into hello_user(name,phone,salt,password,create_time)values('$name','$phone','$salt','$passwd','$createTime');";

	$result =  mysqli_query($dbc,$query) or die("执行查询失败");

	mysqli_close($dbc);

	echo '<script language="JavaScript">;alert("注册成功！赶快去登录吧！");location.href="http://test.helloworld.com/login.html";</script>;';


}

<<<<<<< HEAD
=======
function checkPhone($str){
	if(11 != strlen($str)) return false;
	return preg_match("/13[0-9]{9}|15[0-9]{9}|18[0-9]{9}|147[0-9]{8}|17[0-9]{9}|144[0-9]{8}/",$str);
}

function checkName($str){
	return preg_match("/^[\s0-9a-zA-Z\x80-\xff]+$/", $str);
}

function saltPasswd($pw, $salt){
	return md5(md5($pw) . ', ' . $salt);	
}
>>>>>>> 58cdf863d58f5b6e02bc63387fbc9b5ac9a07559
