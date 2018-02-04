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
if(isset($_POST['save']))
{ 
	 $query="INSERT INTO subject (sname,scode,descp)
	 VALUES('$name','$ssn','$descp');";
	
	 $result=mysqli_query($conn,$query);
     echo $result;
}
?>
<html>
<title>
</title>
<style>
#log {
	width:320px;
	position:absolute;
	
}

</style>
<body>
<div id="log" align="center">
<h3 align="center">ADD SUBEJCT</h3>
<fieldset >
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<table>
<tr>
<td>NAME</td><td>:<input type="text" name="name" ></td></tr>
<td>SUBJECT CODE</td><td>:<input type="text" name="ssn" ></td></tr>
<tr><td>DEscription</td><td>:<input type="text" name="descp" ></td></tr>
<tr ><td colspan='2' align="center"><input type="submit" name="save"></td></tr>
</tr>

</table>
</form>
</fieldset >
</div>
</body>
</html>