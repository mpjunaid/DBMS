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

?>
<html>
<title>
</title>
<style>
#log {
	width:720px;
	position:absolute;
	
}
#qw1,#qw2,#qw3
{ display:none;
}
</style>
<body>
<div id="log" align="center">
<h3 align="center">MARK ENTERING</h3>
<fieldset>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<table>
<tr><td>Enter the student usn whose marks have to be entered</td><td>:
<input type="text" name="ussn"></td>
<td><input type="submit" name="search" value="search"></td></tr></td></tr>
<tr><td colspan="3">
<?php
if(isset($_POST['search']))
{ 	$flag=0;
	session_start();
	$_SESSION["susn"] = $ussn;
	 $query="SELECT * from student where usn='$ussn';";
	 $result=mysqli_query($conn,$query);
     while ($row = mysqli_fetch_array($result))
	 { 	 $flag=1;
	 echo $row['name']." is the name of the student ";
	
	 }
	 if($flag==0)
	 {
		 echo "<div style=\"color:red\">*Student not found</div>";
	 }
	 if($flag==1)
	 {
		 echo"<style> #qw1,#qw2,#qw3
				{ display:block;
				}
				</style>";
	 }
}	?> 
</td></tr>
<tr id="qw1"><td>Select the subject code</td><td>: 
<select name="code1">
<?php 
$qry="SELECT * from subject;";
$result=mysqli_query($conn,$qry);
while ($row = mysqli_fetch_array($result))
{
?>
   <option >
     <?php echo $row['scode']; ?>
    </option>
<?php
}
?>  
   
</select>

</td><td></td>
</tr>
<?php
//
extract($_POST); 
if(isset($_POST['save']))
{  	session_start();
$ussn=$_SESSION["susn"] ;
	 $q="INSERT INTO mark (usn,scode,mark) VALUES('$ussn','$code1','$mark');";
	 $result=mysqli_query($conn,$q);
     echo $result;
}
?>
<tr id="qw2"><td>Enter the marks</td>
<td>:<input type="text" name="mark" ></td><td></td></tr>
<tr id="qw3"><td colspan="3" align="center">
<input type="submit" name="save" value="save">
</td></tr>
<tr>
 

 
</td>
</tr>
</table>
</form>
</fieldset >
</div>
</body>
</html>