<?php
include('dao/conn.php');
$conn=conn_in();
$sql="SELECT * FROM user";
$result=$conn->query($sql);
if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
		echo "id:".$row["uid"]."pass:".$row["password"]."name:".$row["name"]."\n";
	}
}
echo "<br>"."xxxx";
conn_out($conn);
echo "hello world\n";
?>
<script language=javascript> 
function login()
{ 
	form.action=”login.php”; 
	form.submit();
} 
function regist()
{ 
	form.action=”regist.php”; 
	form.submit();
} 
</script> 
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<body>
<h2>Hinata</h2>
<form name="login" action="index.php"  method="post">
user  id:<input type="text" name="uid"><br>
password:<input type="password" name="pass"><br>
<input type="button" value="登录" onclick="login();">
<input type="button" value="注册" onclick="regist();">
</form>
</body>
</html>
