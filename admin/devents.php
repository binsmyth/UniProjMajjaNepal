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
				<li><a href="aevents.php">Add Event</a></li>
				<li><a href="devents.php">Delete Event</a></li>
				<li><a href="eevents.php">Edit Event</a></li>
				
			</ul>
		</div>
		
		<?php
		$sql="select * from event_types";
		$query=mysql_query($sql);
		echo "<fieldset><legend>List of Events</legend>";
		echo "<form name='delete' action='devents_script.php' method='post'>";
		echo "<label for='delete'>Choose One Event</label>";
		echo "<select name=\"delete\">";
		while($row=mysql_fetch_array($query))
		{
			
		
			echo "<option>".$row['event_name']."</option>";
		
	
		
			
			
		}
		echo "</select>";
		echo "<br>";
		echo "<input type=\"submit\" value=\"Delete\" name=\"submit\">";
		echo "</form></fieldset>";
			
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
