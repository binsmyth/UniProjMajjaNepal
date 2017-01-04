<?php
SESSION_START();
include 'include/functions.php';
database_fact();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Majja-Nepal</title>
<link href="style/style.css" type="text/css" rel="stylesheet"/>
<link href="style/style_checkout.css" type="text/css" rel="stylesheet"/>


</head>

<body>
<div id="top_bar">
	<div id="left-top">
		<?php
		if(isset($_SESSION['username']))
			{
				echo "Hi, ".$_SESSION['username'];
				echo "<p><a href=\"include/account_script.php\">Account,</a> <a href=\"users/logout.php\">Logout</a></p>";
			}		
		else 
		{
			?>
			You are not logged in, 
			<form name="login_form" method="POST" action="users/login_script.php">
			Username: <input type="text" name="user_name" />
			Password:<input type="password" name="password" /></br>
			<input type="submit" name="submit" value="LOG_IN"/>
			<a href="users/register.php"><input type="button" name="register" value="REGISTER"></a>
		</form>
			
			<?php
		}
			?>
		



</div>
<div id="right-top">
	Connect With us on 
	<img src="images/facebook.png">
	<img src="images/twitter.png">
</div>

</div>

<div id="logo_bar">
<img src="images/logo.png" height="120px" width="200px" />
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
	echo "<a href=\"$page.php\">".$nav."</a>";
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
			echo "<li>"."<a href=\"include/content.php?cat=$id\">".$row['category_type']."</a>";
			echo "</li>";
		}
		echo "</ul>";
		?>
						
			
			
			
			
			<br>
			
	</div>
	
	<div id="right-content">
	
		
		<fieldset><legend>Contact Form</legend>
		<form name="contact_form" method="POST"  action="include/contact_script.php">
			
			<label for="first_name">First Name:</label><input type="text" name="first_name"><br>
		
			<label for="email">Email:</label><input type="text" name="email"><br>
			<label for="subject">Subject:</label><input type="text" name="subject"><br>
			
			<label for="detail">Detail:</label><textarea name="detail" cols="50" rows="4"></textarea></br>
			<input name="submit_contact" type="submit" value="SEND"/></br>
			
		 </form>
		 </fieldset>
		
		
</div>
</div>


<?php
mysql_close();
?>
</body>
<div id="footer">
	<p align="center">All rights are reserved to DOT 7</p>
	
</div>
</html>
