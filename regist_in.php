<?php
include_once 'help.php';
if(empty($_POST["uid"])||empty($_POST["pass"])||empty($_POST["name"]))
{
    change("用户账号/密码/用户名均不能为空","http://localhost:80/regist.php");
}
if(judge($_POST["uid"])||judge($_POST["pass"]))
{
    change("用户账号和密码均只能为数字或者字母且不小于6位不大于10位","http://localhost:80/regist.php");
}
$uid=$_POST["uid"];
$pass=$_POST["pass"];
$name=$_POST["name"];
include('dao/conn.php');
$conn=conn_in();
$sql="INSERT INTO user (uid,password, name) VALUES ('$uid','$pass','$name')";
if($conn->query($sql)==TRUE)
{
    conn_out($conn);
    change("注册成功","http://localhost:80/index.php");
}
else
{
    conn_out($conn);
    change("用户账号或用户名已经存在","http://localhost:80/regist.php");
}
?>
