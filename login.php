<?php
//echo "login ok";
if(empty($_POST["uid"])||empty($_POST["pass"]))
{
    echo "<script language='javascript'>";
    echo "alert('用户名和密码不能为空')";
    echo "</script>";
    $url = "http://localhost:80/index.php";
    echo "<script language='javascript' 
    type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
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
    echo "<script language='javascript'>";
    echo "alert('用户名或密码错误')";
    echo "</script>";
    $url = "http://localhost:80/index.php";
    echo "<script language='javascript' 
    type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
?>
