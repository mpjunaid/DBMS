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
	width:720px;
	position:absolute;
	
}
#qw	{
	display:none;
}
</style>
<body>
<div id="log" align="center">
<h3 align="center">DELETE SUBEJCT</h3>
<fieldset >
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<table>
<tr><td>Enter the subject code whose data have to be changed have 
to be changed</td><td>:
<input type="text" name="sscode" ></td>
<td><input type="submit" name="search" value="search"></td></tr></td></tr>
<tr><td colspan="3">
<?php
if(isset($_POST['search']))
{ 	$flag=0;
session_start();
	$_SESSION["xss"] = $sscode;
	 $query="SELECT * from subject where scode='$sscode';";
	 $result=mysqli_query($conn,$query);
     while ($row = mysqli_fetch_array($result))
	 { 	 $flag=1;
	 if($sscode==$row['scode'])
			{$r1=$row['sname'];
			$r2=$row['scode'];
		
			$r3=$row['descp'];
			
	 }
	 }
	 if($flag==0)
	 {
		 echo "<div style=\"color:red\">*Subject not found</div>";
	 }
	 if($flag==1)
	 {
	$query="DELETE FROM subject WHERE scode='$sscode';";
	
	 $result=mysqli_query($conn,$query);
     echo $result."Delete Successfull";
	 }
}	


	



?> 
</td></tr>

</table>

</form>
</fieldset >
</div>
</body>
</html>