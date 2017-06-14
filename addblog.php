<?php
include_once 'help.php';
if(empty($_POST["title"])||empty($_POST["content"]))
{
    help::Pop_info("标题和内容不能为空");
    help::Jump_page("http://localhost:80/addblog_ui.php");
}
else
{
    help::Test_cookie();
    if(!empty($_COOKIE['uid']))
    {
        $uid = $_COOKIE["uid"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $time = date("Y-m-d", time());
        $id = strtotime("now");
        $id .= $uid;
        $title=htmlspecialchars($title);
        $content=htmlspecialchars($content);
        include_once('dao/conn.php');
        $conn = new conn();
        $conn->operation_insert_blog($uid,$title,$content,$id);
        help::Pop_info("创建成功");
        help::Jump_page("http://localhost:80/menu.php");

    }
}
?>

