<?php 

SESSION_START();

include '../include/functions.php';
database_fact();

	$user=$_POST["user_name"];
	$pass=$_POST["password"];
	$hash_pass=md5($pass);
	$query="select * from users where user_name='$user' and password='$hash_pass' ";
	$result=mysql_query("$query");
	$count=mysql_num_rows($result);
	if($count==1){
			$fetch=mysql_fetch_array($result);
			extract($fetch);		
			$_SESSION['username']=$first_name;
			$_SESSION['usertype']=$user_type;
			$_SESSION['user_id']=$user_id;
			
			header("location:../index.php");
		}
	
	
	else {
		header("location:../index.php");
	
	}
	
		
	?>




