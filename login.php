<?php
include_once 'help.php';
if(empty($_POST["uid"])||empty($_POST["pass"]))
{
    help::Pop_info("用户名和密码不能为空");
    help::Jump_page("http://localhost:80/index.php");
}
$uid=$_POST["uid"];
$pass=$_POST["pass"];
include('dao/conn.php');
$conn=conn_in();
$sql="SELECT * FROM user WHERE uid='";
$sql.=$uid;
$sql.="' AND password='";
$sql.=$pass;
$sql.="';";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    $row=$result->fetch_assoc();
    $name=$row["name"];
    echo "welcome blog ,$name";
    conn_out($conn);
    setcookie("uid", "$uid", time()+3600);
    help::Jump_page("http://localhost:80/addblog_ui.php");
}
else
{
    conn_out($conn);
    help::Pop_info("用户名或密码错误");
    help::Jump_page("http://localhost:80/index.php");
}
?>
