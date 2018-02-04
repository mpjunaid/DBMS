<?php
$hostname="localhost"; 
$username="staff";
$password="qwerty";
$database="staff";
$conn=mysqli_connect($hostname,$username,$password,$database);
 extract($_POST);
if(!$conn)
{
die("Connection cannot be establish: " . mysqli_connect_error());
}
else
{
	
	echo"<p>connection succesfull<p>";
}
$query="SELECT * from teacher;";
$result=mysqli_query($conn,$query);
echo"<html>
<body>

<div align=\"center\">
<h1 style=\"color:blue;\">TEACHER DETAIL DISPLAY</h1>
<table  border=\"1\" cellspacing=\"0\" cellpadding=\"10\"><tr><td>NAME</td><td>SSD</td><td>Mobile</td><td>DEPT</td>";
while ($row = mysqli_fetch_array($result))
{ 
echo"
<tr><td>".$row['name']."</td>
<td>".$row['ssd']."</td>
<td>".$row['mobile']."</td>
<td>".$row['dept']."</td>
</tr>
";
}
echo "</table>
</div>
</body>
</html>";
?>
