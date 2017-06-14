<?php
include_once 'help.php';
$id=$_GET['id'];
if(empty($_POST["title"])||empty($_POST["content"]))
{
    help::Pop_info("标题和内容不能为空");
    help::Jump_page("http://localhost:80/edit.php?id=$id");
}
else
{
    help::Test_cookie();
    if(!empty($_COOKIE['uid']))
    {
        $title = $_POST["title"];
        $content = $_POST["content"];
        include('dao/conn.php');
        $conn = new conn();
        $result = $conn->operation_update_blog($id,$title,$content);
        help::Pop_info("修改成功");
        help::Jump_page("http://localhost:80/view.php?id=$id");
    }
}
?>