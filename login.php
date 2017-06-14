<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
<?php
include_once 'help.php';
if(empty($_POST["uid"])||empty($_POST["pass"]))
{
    help::Pop_info("用户名和密码不能为空");
    help::Jump_page("http://localhost:80/index.php");
}
else if(help::judge($_POST["uid"],1))
{
    help::Pop_info("用户账号只能为数字且不小于6位不大于10位");
    help::Jump_page("http://localhost:80/index.php");
}
else if(help::judge($_POST["pass"],2))
{
    help::Pop_info("用户密码只能为数字或字母且不小于6位不大于10位");
    help::Jump_page("http://localhost:80/index.php");
}
else
{

    $uid = $_POST["uid"];
    $pass = $_POST["pass"];
    include('dao/conn.php');
    $conn = new conn();
    $result=$conn->operation_query_count_user($uid);
    $num = $result->rowCount();
    $row=$result->fetch();
    if ($num> 0 && $row['password'] == $pass)
    {
        $name = $row["name"];
      //  echo "welcome blog ,$name";
        setcookie("uid", "$uid", time() + 3600);
        setcookie("uname", "$name", time() + 3600);
        setcookie("pass", help::Hash($pass), time() + 3600);
        help::Jump_page("http://localhost:80/menu.php");
    }
    else
    {
        help::Pop_info("用户名或密码错误");
        help::Jump_page("http://localhost:80/index.php");
    }
}
?>
</body>
</html>
