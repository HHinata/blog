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
        $conn = conn_in();
        $sql = "UPDATE blog SET title='$title',data='$content' WHERE id='$id'";
        if ($conn->query($sql) == TRUE)
        {
            conn_out($conn);
            help::Pop_info("修改成功");
            help::Jump_page("http://localhost:80/view.php?id=$id");
        }
        else
        {
            echo mysqli_error($conn);
            conn_out($conn);
            help::Pop_info("出错请重试");
            help::Jump_page("http://localhost:80/edit.php?id=$id");
        }
    }
}
?>