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
</head>

<body>
<div id="top_bar">
	<div id="left-top">
		<?php
				echo "Hi, ".$_SESSION['username'];
				echo "<p><a href=\"../index.php\">Home,</a> <a href=\"users/logout.php\">Logout</a></p>";
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
	<div id="nav_bar" class="style">
		<ul>
			<li><a href="profile.php">My Details</a></li>
			<li><a href="change_password.php">Password</a></li>
			<li><a href="address.php">Address</a></li>
			<li><a href="pre_orders.php">Previous Orders</a></li>
		</ul>
	</div>
	<div id="left-content">
	</div>
	<div id="right-content">
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
