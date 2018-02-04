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
	 $query="INSERT INTO student (name,usn,mobile,dept,section)
	 VALUES('$name','$usn','$no','$dept','$sec');";
	
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
<h3 align="center">STUDENT REGISTRATION</h3>
<fieldset >
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<table>
<tr>
<td>NAME</td><td>:<input type="text" name="name" ></td></tr>
<td>USN</td><td>:<input type="text" name="usn" ></td></tr>
<tr><td>Mobile Number</td><td>:<input type="text" name="no" ></td></tr>
<td>DEPT</td><td>:<select name="dept"><option>CSE</option><option>MEC</option></select></td>
<tr><td>SECTION</td><td>:<select name="sec"><option>A</option><option>B</option><option>C</option></select></td></tr>
<tr ><td colspan='2' align="center"><input type="submit" name="SAVE"></td></tr>
</tr>

</table>
</form>
</fieldset >
</div>
</body>
</html>