<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
<?php
include_once 'help.php';
if(empty($_POST["uid"])||empty($_POST["pass"])||empty($_POST["name"]))
{
    help::Pop_info("用户账号/密码/用户名均不能为空");
    help::Jump_page("http://localhost:80/regist_ui.php");
}
else if(help::judge($_POST["uid"],1))
{
    help::Pop_info("用户账号只能为数字且不小于6位不大于10位");
    help::Jump_page("http://localhost:80/regist_ui.php");
}
else if(help::judge($_POST["pass"],2))
{
    help::Pop_info("用户密码只能为数字或字母且不小于6位不大于10位");
    help::Jump_page("http://localhost:80/regist_ui.php");
}
else if(help::judge($_POST["name"],0))
{
    help::Pop_info("用户名不能包含特殊符号");
    help::Jump_page("http://localhost:80/regist_ui.php");
}
else
{

    $uid = $_POST["uid"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    include('dao/conn.php');
    $conn = new conn();
    if($conn->operation_query_count_user($uid)->rowCount()>0)
    {
        help::Pop_info("用户账号或用户名已经存在");
        help::Jump_page("http://localhost:80/regist_ui.php");
    }
    else
    {
        $conn->operation_insert_user($uid, $name, $pass);
        help::Pop_info("注册成功");
        help::Jump_page("http://localhost:80/index.php");
    }
}
?>
</body>
</html>
