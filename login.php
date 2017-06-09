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
else
{

    $uid = $_POST["uid"];
    $pass = $_POST["pass"];
    include('dao/conn.php');
    $sql = "SELECT * FROM user WHERE uid='";
    $sql .= $uid;
    $sql .= "' AND password='";
    $sql .= $pass;
    $sql .= "';";
    $result=operation($sql);
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        echo "welcome blog ,$name";
        setcookie("uid", "$uid", time() + 3600);
        setcookie("uname", "$name", time() + 3600);
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
