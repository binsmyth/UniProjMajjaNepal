<?php
SESSION_START();

if(!isset($_SESSION['username']))
{
	header("location:../index.php");
}
else 
{
	
include '../include/functions.php';
database_fact();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Majja-Nepal</title>
<link href="../style/style.css" type="text/css" rel="stylesheet"/>
<link href="../style/style_checkout.css" type="text/css" rel="stylesheet"/>
<style>
#left-content {
	padding-top:30px;
	color:white;
	
}

#left-content table{
	border:1px #006699 solid;
	width:200px;
	padding:10px;
	
}

#left-content table a {
	text-decoration:none;
	color:#003366;
}

#right-content {
	padding-top:30px;
}

#wrapper {
	border-top:1px solid #003366;
	margin-top:20px;
}
</style>
</head>

<body>
<div id="top_bar">
	<div id="left-top">
		<?php
				echo "Hi, ".$_SESSION['username'];
				echo "<p><a href=\"../index.php\">Home,</a> <a href=\"logout.php\">Logout</a></p>";
				?>



</div>
<div id="right-top">
	Connect With us on 
	<img src="../images/facebook.png">
	<img src="../images/twitter.png">
</div>

</div>

<div id="logo_bar">
<img src="../images/logo.png" height="120px" width="200px" />
<h1>The gateway for every events start here...</h1>

</div>


<div id="wrapper">
	
	<div id="left-content">
		<table>
			<tr><th bgcolor="#003366">My Details</th></tr>
			<tr><td><a href="profile.php">Edit your First Name, Last Name and mobile Number</a></td></tr>
		</table>
		<br>
		<table>
			<tr><th bgcolor="#003366">Password</th></tr>
			<tr><td><a href="password.php">Update your New password</a></td></tr>
		</table>
		<br>
		<table>
			<tr><th bgcolor="#003366">Previous order</th></tr>
			<tr><td><a href="pre_orders.php">Check your Previous order and history</a></td></tr>
		</table>
		<br>
		<table>
			<tr><th bgcolor="#003366">Address</th></tr>
			<tr><td><a href="pre_orders.php"><a href="address.php">Change your Address</a></td></tr>
		</table>
	</div>
	<div id="right-content">




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
			
			
	</div>


</div>


<?php
mysql_close();
?>
</body>
<div id="footer">
	<p align="center">All rights are reserved to DOT 7</p>
	
</div>
<?
}
?>
</html>





