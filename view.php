<script>
    function del()
    {
        if(confirm('确定要删除吗？'))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
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
    $uname = $_COOKIE['uname'];
    $result=operation("select * from blog where id='$id'");
    $row = mysqli_fetch_assoc($result);
}
?>
<h2>title: <?php echo $row['title'];?></a>
    | <a href="edit.php?id=<?php echo $id; ?>">edit</a>
    | <a href="del.php?id=<?php echo $id; ?>" onclick="return del();">delete</a>
    | <a href="menu.php">back</a>
</h2>
date: <?php echo $row['date']; ?>
by:<?php echo $uname;?>
<p>content:<?php echo $row['data'];?></p>
<hr>
</body>
</html>
