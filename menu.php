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
<h3></a><a href="addblog_ui.php">新建</a></h3>
<h3></a><a href="index.php">退出</a></h3>
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
    $conn = new conn();
    $count = $conn->operation_query_count_blog(true);
    $totalNumber = $count;
    $totalPage = ceil($totalNumber / $perNumber); //计算出总页数
    if (!isset($page)) $page = 1;
    $startCount = ($page - 1) * $perNumber; //分页开始,根据此方法计算出开始的记录'
    $result = $conn->operation_query_blog($startCount,$perNumber,$uid);
    while ($row = $result->fetch())
    {
        ?>
        <h3>title: <a href="view.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
            | <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
            | <a href="del.php?id=<?php echo $row['id']; ?>" onclick="return del();">delete</a>
        </h3>
        date: <?php echo $row['createtime']; ?>
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