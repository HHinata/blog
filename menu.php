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
<h2>Menu</h2>
<h3></a><a href="addblog_ui.php">新建blog</a></h3>
<?php
include_once("dao/conn.php");
include_once 'help.php';
help::Test_cookie();
if(!empty($_COOKIE['uid']))
{
    $uid = $_COOKIE["uid"];
    $uname = $_COOKIE["uname"];
    $perNumber = 5; //每页显示的记录数
    $page = $_GET['page']; //获得当前的页面值

    $count = operation("select count(*) from blog where uid='$uid'");//获得记录总数
    $rs = mysqli_fetch_array($count);
    $totalNumber = $rs[0];
    $totalPage = ceil($totalNumber / $perNumber); //计算出总页数
    if (!isset($page)) $page = 1;
    $startCount = ($page - 1) * $perNumber; //分页开始,根据此方法计算出开始的记录'

    $result = operation("select * from blog where uid='$uid' order by id desc limit $startCount,$perNumber"); //根据前面的计算出开始的记录和记录数
    while ($row = mysqli_fetch_assoc($result))
    {
        ?>
        <h3>title: <a href="view.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
            | <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
            | <a href="del.php?id=<?php echo $row['id']; ?>" onclick="return del();">delete</a>
        </h3>
        date: <?php echo $row['date']; ?>
        by:<?php echo $uname; ?>
        <!--截取内容展示长度-->
        <p>content:<?php echo iconv_substr($row['data'], 0, 30, "utf-8"); ?>...</p>
        <hr>
        <?php
    }
    if ($page != 1)
    {
        ?>
        <a href="menu.php?page=<?php echo $page - 1; ?>">上一页</a> <!--显示上一页-->
        <?php
    }
    for ($i = 1; $i <= $totalPage; $i++)
    {
        ?>
        <a href="menu.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php
    }
    if ($page < $totalPage)
    {
        ?>
        <a href="menu.php?page=<?php echo $page + 1; ?>">下一页</a>
        <?php
    }
}
?>
</body>
</html>