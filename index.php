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
