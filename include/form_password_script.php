<?php
	SESSION_START();
	include 'functions.php';
	database_fact();
	if(isset($_SESSION['username']))
	{
		$opass=$_POST['old_pass'];
		$npass=$_POST['new_pass'];
		$n1pass=$_POST['new_pass1'];
		$user=$_SESSION['username'];
		$pass1=md5($opass);
		$pass=md5($npass);
		
		if($opass!="" and $npass!="" and $n1pass!="" and $npass==$n1pass)

			{
					$sql1="update users set password='$pass'";
					mysql_query($sql1);
						
					echo "Password has been changed!!";
				}
				
		else 
		{
			echo "All fields are required and password should be correct. ";
		}
			
	}
	else 
		echo "something wrong";
	
	?>