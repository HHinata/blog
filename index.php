<script>
function login()
{
	var form=document.form1;
	form.action="login.php"; 
	form.submit();
} 
function regist()
{
	var form=document.form1;
	form.action="regist_ui.php";
	form.submit();
} 
</script>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
<h2>Hinata</h2>
<form name="form1" method="post">
user  id:<input type="text" name="uid"><br>
password:<input type="password" name="pass"><br>
<input type="button" value="登录" onclick="login()">
<input type="button" value="注册" onclick="regist()">
</form>
</body>
</html>
