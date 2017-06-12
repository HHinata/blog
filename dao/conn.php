<?php
function conn_in()
{
	$servername="localhost";
    $username="root";
    $password="869628168";
    $dbname="blog";
    $connect = new mysqli($servername,$username,$password,$dbname);
    if($connect->connect_error)
    {
        die(“连接失败：”.$connect->connect_error);
    }
    else
    {
        mysqli_query($connect,'SET NAMES UTF8');
        return $connect;
    }
}
function conn_out($connect)
{
    $connect->close();
}
function operation($sql)
{
    $connect = conn_in();
    $result=$connect->query($sql);
    conn_out($connect);
    return $result;
}
?>
