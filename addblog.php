<?php
include_once 'help.php';
if(empty($_POST["title"])||empty($_POST["content"]))
{
    help::Pop_info("标题和内容不能为空");
    help::Jump_page("http://localhost:80/addblog_ui.php");
}
help::Test_cookie();
$uid=$_COOKIE["uid"];
$title=$_POST["title"];
$content=$_POST["content"];
$date=date();
$id=strtotime("now");
$id.=$uid;
echo $id;
//echo $id."  ".$uid;
/*include('dao/conn.php');
$conn=conn_in();
$sql="INSERT INTO user (uid,password, name) VALUES ('$uid','$pass','$name')";
if($conn->query($sql)==TRUE)
{
    conn_out($conn);
    help::Pop_info("注册成功");
    help::Jump_page("http://localhost:80/index.php");
}
else
{
    conn_out($conn);
    help::Pop_info("用户账号或用户名已经存在");
    help::Jump_page("http://localhost:80/regist.php");
}*/
?>

