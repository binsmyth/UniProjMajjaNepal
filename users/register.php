<?php
SESSION_START();
include '../include/functions.php';
database_fact();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Majja-Nepal</title>
<link href="../style/style.css" type="text/css" rel="stylesheet"/>
<link href="../style/styleorder.css" type="text/css" rel="stylesheet"/>
<link href="../style/style_checkout.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<div id="top_bar">
	<div id="left-top">
		<?php
		
		
		if(isset($_SESSION['username']))
			{
				echo "Hi, ".$_SESSION['username'];
				echo "<p><a href=\"profile.php\">Account,</a> <a href=\"users/logout.php\">Logout</a></p>";
			}		
		else 
		{
			?>
			You are not logged in, 
			<form name="login_form" method="POST" action="login_script.php">
			Username: <input type="text" name="user_name" />
			Password:<input type="password" name="password" /></br>
			<input type="submit" name="submit" value="LOG_IN"/>
			<a href="users/register.php"><input type="button" name="register" value="REGISTER"></a></form>
			
			<?php
		}
			?>
		


</div>
<div id="right-top">
	Connect With us on 
	<img src="../images/facebook.png">
	<img src="../images/twitter.png">
</div>

</div>

<div id="logo_bar">
<img src="../images/logo.png" height="120" width="200"/>
<h1>The gateway for every events start here...</h1>

</div>


<div id="wrapper">

<div id="nav_bar">
<?php
$sql="select * from nav_pages";
$result=mysql_query($sql);
while ($row=mysql_fetch_array($result))
{
	$page=$row['page_name'];
	$nav=$row['nav_name'];
	echo "<li>";
	echo "<a href=\"../$page.php\">".$nav."</a>";
	echo "</li>";
}

?>
</div>

	<div id="left-content">
		<?php
		echo "<ul>Categories";
		$sql="select * from categories";
		$result=mysql_query($sql);
		while ($row=mysql_fetch_array($result)){
			$id=$row['category_id'];
			echo "<li>"."<a href=\"../include/content.php?cat=$id\">".$row['category_type']."</a>";
			echo "</li>";
		}
		echo "</ul>";
		?>
		<p>Subscribe with Us</p>
			<input type="text" name="email" value="youremail@mail.com">
			<input type="submit" name="submit" Value="Subscribe">
	</div>
	<div id="right-content">
		
			<br>
			<form id="register" name="form1" method="post" action="register_script.php">
				<fieldset>
					<legend>Register Form</legend>
					<label for="fname">Full Name</label><input type="text" name="fname" id="fname"><br>
			<label for ="email">Email:</label><input type="text" name="email" id="email"><br>
			<label for="password">Password:</label><input type="password" name="password" id="password"><br>
			<label for="password1">Re-Type Password:</label><input type="password" name="password1" id="password1"><br>
			<input type="submit" name="submit" value="Login">
			</fieldset>
			</form>
	
	
		
	
</div>
</div>


<?php
mysql_close();
?>
</body>
<div id="footer">
	<p align="center">All rights are reserved to DOT 7
	</p>
</div>
</html>