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
$time=date("Y-m-d", time());
$id=strtotime("now");
$id.=$uid;
echo $id.'<br>';
include('dao/conn.php');
$conn=conn_in();
$sql="INSERT INTO blog VALUES ('$id','$title','$content','$time','$uid')";
if($conn->query($sql)==TRUE)
{
    conn_out($conn);
    help::Pop_info("创建成功");
    help::Jump_page("http://localhost:80/menu.php");
}
else
{
    echo mysqli_error($conn);
    conn_out($conn);
    help::Pop_info("出错请重试");
    help::Jump_page("http://localhost:80/addblog_ui.php");
}
?>

