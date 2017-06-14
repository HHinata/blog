<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
<h2>新建博客</h2>
<?php
    include_once 'help.php';
    help::Test_cookie();
?>

<form action="addblog.php" method="post">
    标题：<input type="text" name="title"/><br/>
    内容：<textarea rows="5" cols="50" name="content"></textarea><br/>
    <input type="submit" name="submit" value="提交"/><br/>
</form>
</body>
</html>
