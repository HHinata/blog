<?php
//echo "login ok";s
include_once 'help.php';
if(empty($_POST["uid"])||empty($_POST["pass"]))
{
    change("用户名和密码不能为空","http://localhost:80/index.php");
}
$uid=$_POST["uid"];
$pass=$_POST["pass"];
//echo "$uid"."  "."$pass";
include('dao/conn.php');
$conn=conn_in();
$sql="SELECT * FROM user WHERE uid='";
$sql.=$uid;
$sql.="' AND password='";
$sql.=$pass;
$sql.="';";
//echo "$sql";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    $row=$result->fetch_assoc();
    $name=$row["name"];
    echo "welcome blog ,$name";
   // echo "id:".$row["uid"]."pass:".$row["password"]."name:".$row["name"]."\n";
    conn_out($conn);
}
else
{
    conn_out($conn);
    change("用户名或密码错误","http://localhost:80/index.php");
}
?>
