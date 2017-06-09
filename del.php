<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
<?php
include_once 'help.php';
include_once 'dao/conn.php';
help::Test_cookie();
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $conn = conn_in();
    $uname = $_COOKIE['uname'];
    $conn->query("delete from blog where id='$id'");
    conn_out($conn);
    help::Pop_info("成功删除");
    help::Jump_page("menu.php");
}
?>
</body>
</html>
gi