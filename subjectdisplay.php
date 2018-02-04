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
<h3 align="center" valign="center"> SUBJECT VIEW</h3>
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
		echo "<fieldset ><table width=\"60%\">
	<tr><td> Name</td><td>:".$r1."</td></tr>
	<tr><td> CODE</td><td>:".$r2."</td></tr>
	<tr><td> DESCRIPTION</td><td>:".$r3."</td></tr>
	
	</table></fieldset >";
	 }
}	

?> 
</td></tr>

</table>
<table id="qw">
<tr>
<td>NAME</td><td>:<input type="text" name="name" value=<?php echo $r1;?>></td></tr>
<td>SUBJECT CODE</td><td>:<input type="text" name="ssn" value=<?php echo $r2;?>></td></tr>
<tr><td>Description</td><td>:<input type="text" name="descp" value=<?php echo $r3;?>></td></tr>
<tr ><td colspan='2' align="center"><input type="submit" name="save"></td></tr>
</tr>

</table>
</form>
</fieldset >
</div>
</body>
</html>