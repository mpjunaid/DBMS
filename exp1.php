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


$query="SELECT r.usn,t.name from relation r,teacher t where r.usn=122 and r.ssd=t.ssd;";
	 $result=mysqli_query($conn,$query);
	 while ($row = mysqli_fetch_array($result))
	 { 	
	 if(122==$row['usn'])
			$r7=$row['name'];
			
			
	}
echo $r7;
?>