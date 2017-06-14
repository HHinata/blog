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
    $uname = $_COOKIE['uname'];
    $conn = new conn();
    $conn->operation_delete_blog($id);
    help::Pop_info("成功删除");
    help::Jump_page("menu.php");
}
?>
</body>
</html>