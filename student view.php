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
#qw	{
	display:none;
}

</style>
<body>
<div id="log" align="center">
<h3 align="center">STUDENT DISPLAY</h3>
<fieldset >
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
<table>
<tr><td>Enter the student usn whose data have to be displayed</td><td>:
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
	 $r7="";
	 if($flag==1)
	 {
			$qery="SELECT * from relation where usn='$ussn';";
	 $reslt=mysqli_query($conn,$qery);
	 while ($row = mysqli_fetch_array($reslt))
	 { 	 $flag=1;
	 if($ussn==$row['usn'])
			{$r7=$row['ssd'];
			
			}
	}
	$qer="SELECT * from teacher where ssd='$r7'";
	 $resl=mysqli_query($conn,$qer);
	 while ($row = mysqli_fetch_array($resl))
	 { 	 $flag=1;
	 if($r7==$row['ssd'])
			{$r7=$row['name'];
			
			}
	}
	 
	echo "<fieldset ><table width=\"60%\">
	<tr><td> Name</td><td>:".$r1."</td></tr>
	<tr><td> USN</td><td>:".$r2."</td></tr>
	<tr><td> MOBILE NUMBER</td><td>:".$r3."</td></tr>
	<tr><td> DEPARTMENT</td><td>:".$r4."</td></tr>
	<tr><td>SECTION</td><td>:".$r5."</td></tr>
	<tr><td>MENTOR NAME</td><td>:".$r7."</td></tr>
	</table></fieldset >"; 
	
	 }
	 $query="SELECT * from mark where usn='$ussn';";
	 $result=mysqli_query($conn,$query);
	 echo "MARKS OF STUDENT<table border=\"1\" cellspacing=\"0\"><tr><td><b>SUBJECT CODE<b></td><td><b>SUBJECT MARK<b></td></tr>";
	 while ($row = mysqli_fetch_array($result))
	 { 
        echo "<tr><td>".$row["1"]."</td><td>".$row["2"]."</td><tr>";
	 }
	 echo "</table>";
}
?> 
</td></tr>

</table>

</form>
</fieldset >
</div>
</body>
</html>