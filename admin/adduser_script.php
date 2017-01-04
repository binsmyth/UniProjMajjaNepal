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
				echo "<p><a href=\"../index.php\">Home,</a> <a href=\"../users/logout.php\">Logout</a></p>";
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
			<tr><th bgcolor="#003366">My Account</th></tr>
			<tr><td><a href="profile.php">My Details</a></td></tr>
			<tr><td><a href="password.php">My Password</a></td></tr>
			<tr><td><a href="address.php">My Address</a></td></tr>
		</table>
		<br>
		<table>
			<tr><th bgcolor="#003366">User Settings</th></tr>
			<tr><td><a href="adduser.php">Add User</a></td></tr>
			<tr><td><a href="delete.php">Delete User</a></td></tr>
			<tr><td><a href="search.php">Search User</a></td></tr>
		</table>
		<br>
		<table>
			<tr><th bgcolor="#003366">Events</th></tr>
			<tr><td><a href="aevents.php">Add Events</a></td></tr>
			<tr><td><a href="devents.php">Delete Events</a></td></tr>
			<tr><td><a href="eevents.php">Edit Events</a></td></tr>
		</table>
		
	</div>
	<div id="right-content">
		
		<div id="nav_bar" class="style">
			<ul>
				<li><a href="adduser.php">Add User</a></li>
				<li><a href="delete.php">Delete User</a></li>
				<li><a href="search.php">Search User</a></li>
				
			</ul>
		</div>
		<?php
		$fname=$_POST['fname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password1=$_POST['password1'];
		$id=$_SESSION['user_id'];
		$pass=md5($password);
		
		if(($fname=="") or ($email=="") or($password=="") or($password1=="")){
			echo "You need to Fill up all the fields!!!";
				echo "<br>Please go <a href=\"adduser.php\">Back</a>";
		}
		else
		{
			if(($password==$password1))
				{
					
					$sql="insert into users (first_name, user_name, password) values ('$fname', '$email', '$pass')";
					$result=mysql_query($sql);
					
					echo "You have successfully added user!!!";
				}
				else {
					echo "Your Password do not Match!!!";
				
				}
			}
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
<?php
}
?>
</html>