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
	width:720px;
	position:absolute;
	
}
#qw	{
	display:none;
}

</style>
<body>
<div id="log" align="center">
<h3 align="center">STUDENT update</h3>
<fieldset >
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
<table>
<tr><td>Enter the student usn whose data have to be changed have 
to be entered</td><td>:
<input type="text" name="ussn" ></td>
<td><input type="submit" name="search" value="search"></td></tr></td></tr>
<tr><td colspan="3">
<?php
if(isset($_POST['search']))
{ 	$flag=0;
session_start();
	$_SESSION["xssl"] = $ussn;
	 $query="SELECT * from student where usn='$ussn';";
	 $result=mysqli_query($conn,$query);
     while ($row = mysqli_fetch_array($result))
	 { 	 $flag=1;
	 if($ussn==$row['usn'])
			{$r1=$row['name'];
			$r2=$row['usn'];
		
			$r3=$row['mobile'];
			$r4=$row['dept'];
			$r5=$row['section'];
	 }
	 }
	 if($flag==0)
	 {
		 echo "<div style=\"color:red\">*Student not found</div>";
	 }
	 if($flag==1)
	 {
		 echo"<style> #qw
				{ display:block;
				}
				</style>";
	 }
}	
if(isset($_POST['SAVE']))
{ 	
session_start();
	$ussn=$_SESSION["xssl"] ;
$query="DELETE FROM student WHERE usn='$ussn';";
	
	 $result=mysqli_query($conn,$query);
     echo $result;

	 $query="INSERT INTO student (name,usn,mobile,dept,section)
	 VALUES('$name','$usn','$no','$dept','$sec');";
	
	 $result=mysqli_query($conn,$query);
     echo $result."  :update successfull";
}
?> 
</td></tr>

</table>
<table id="qw">
<tr>
<td>NAME</td><td>:<input type="text" name="name" value=<?php echo $r1;?> ></td></tr>
<td>USN</td><td>:<input type="text" name="usn" value=<?php echo $r2;?>></td></tr>
<tr><td>Mobile Number</td><td>:<input type="text" name="no" value="<?php echo $r3;?>"></td></tr>
<td>DEPT</td><td>:<select name="dept" value=<?php echo $r4;?>>
<option value="CSE">CSE</option>
<option value="MSE">MEC</option>
</select></td>
<tr><td>SECTION</td><td>:<select name="sec" value="<?php echo $r5;?>">
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
</select></td></tr>
<tr ><td colspan='2' align="center"><input type="submit" name="SAVE"></td></tr>
</tr>

</table>
</form>
</fieldset >
</div>
</body>
</html>