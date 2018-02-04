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
if(isset($_POST['SAVE']))
{ 
	 $query="INSERT INTO relation (ssd,usn)
	 VALUES('$ssd','$usn');";
	
	 $result=mysqli_query($conn,$query);
     echo $result;
}
?>
<html>
<body>
<div id="log" align="center">
<h3 align="center">STUDENT REGISTRATION</h3>
<fieldset >
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<table>
<tr>
<td>Techer ID</td><td>:<input type="text" name="ssd" ></td></tr>
<tr><td>Student ID</td><td>:<input type="text" name="usn" ></td></tr>
<tr ><td colspan='2' align="center"><input type="submit" name="SAVE"></td></tr>
</tr>

</table>
</form>
</fieldset >
</div>
</body>

</html>