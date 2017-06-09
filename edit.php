<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
<?php
include_once 'help.php';
include_once 'dao/conn.php';
help::Test_cookie();
if(!empty($_COOKIE['uid']))
{
    $id = $_GET['id'];
    $conn = conn_in();
    $result = $conn->query("select * from blog where id='$id'");
    $row = mysqli_fetch_assoc($result);
}
?>
<form action="update.php?id=<?php echo $id;?>" method="post">
    title  :<br>
    <input type="text" name="title" value="<?php echo $row['title'];?>">
    <br><br>
    contents:<br>
    <textarea rows="5" cols="50" name="content" ><?php echo $row['data'];?></textarea><br><br>
    <input type="submit" name="sub" value="更新">
</form>
</body>
</html>
