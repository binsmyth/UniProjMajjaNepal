<?php
SESSION_START();
include '../include/functions.php';
database_fact();
if(isset($_SESSION['username']))
{
	$id=$_SESSION['user_id'];
	$sql="select * from users where user_id=$id";
	$query=mysql_query($sql);
	while($row=mysql_fetch_array($query))
	{
		$type=$row['user_name'];
		if($type=='deep_yashu@yahoo.com')
		{
			header('location:../admin/profile.php');
		}
		
		else
			{
				header('location:../users/profile.php');
			}	
	}
}
else {
	echo "Please login and come back again</br>";
	echo "<a href='../index.php'>Back</a>";
}
?>