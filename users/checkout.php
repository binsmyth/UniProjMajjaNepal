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
			<form name="login_form" method="POST" action="users/login_script.php">
			Username: <input type="text" name="user_name" />
			Password:<input type="password" name="password" /></br>
			<input type="submit" name="submit" value="LOG_IN"/>
			<a href="users/register.php"><input type="button" name="register" value="REGISTER"></a>
			
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
		<?
		if(!($_SESSION['user_id']))
		{
			?>
				<form name="checkout" action="#">
				<fieldset><legend>Customer Information</legend>
					<label for="email">Email Address:</label><input type="text" name="email"><br>
					<label for="password">Password:</label><input type="password" name="email"><br>
					<label for="fname">First Name:</label><input type="text" name="fname"><br>
					<label for="lname">Last Name:</label><input type="text" name="email"><br>
					<label for="mobile">Mobile Number:</label><input type="text" name="mobile"><br>
			
		
				</fieldset>
		
				<fieldset>
					<legend>Delivery Information</legend>
					<label for="saddress">Street Address:</label><input type="text" name="saddress"><br>
			
					<label for="suburb">Suburb:</label><input type="text" name="suburb"><br>
					<label for="state">State:</label><input type="text" name="state"><br>
					<label for="post_code">Post Code:</label><input type="text" name="post_code"><br>
			
		
				</fieldset>
				<fieldset>
		
				<input type="submit" name="submit" value="NEXT" >
			</fieldset>
		
		
			</form>
			<?php
	
			
		}
		
		else {
			$id=$_SESSION['user_id'];
			$user1=$_SESSION['username'];
			echo "<form name=\"checkout\" action=\"#\">";
			$sql="select * from users where user_id=$id";
			$query=mysql_query($sql);
			?><form name="checkout" action="#"><?php
			while($row=mysql_fetch_array($query))
			{
				$fname=$row['first_name'];
				$lname=$row['last_name'];
				$mobile=$row['mobile_num'];
				$user=$row['user_name'];
				?>
			
			<fieldset><legend>Customer Information</legend>
				<label for="email">Email Address:</label><input type="text" name="email" value="<?php echo $user; ?>"><br>
				<label for="password">Password:</label><input type="password" name="email" ><br>
				<label for="fname">First Name:</label><input type="text" name="fname" value="<?php echo $fname; ?>"><br>
				<label for="lname">Last Name:</label><input type="text" name="lname" value="<?php echo $lname; ?>"><br>
				<label for="mobile">Mobile Number:</label><input type="text" name="mobile" value="<?php echo $mobile; ?>"><br>
		
	
			</fieldset>
			<?php
		}
		
		$sql1="select * from address where user_id=$id";
		$query1=mysql_query($sql1);
		while($row1=mysql_fetch_array($query1))
		{
			$faddress=$row1['faddress'];
			$suburb=$row1['suburb'];
			$state=$row1['state'];
			$post=$row1['post_code'];
			?>
		<fieldset>
			<legend>Delivery Information</legend>
			<label for="saddress">Street Address:</label><input type="text" name="saddress" value="<?php echo $faddress; ?>"><br>
	
			<label for="suburb">Suburb:</label><input type="text" name="suburb" value="<?php echo $suburb; ?>"><br>
			<label for="state">State:</label><input type="text" name="state" value="<?php echo $state; ?>"><br>
			<label for="post_code">Post Code:</label><input type="text" name="post_code" value="<?php echo $post; ?>"><br>
	

		</fieldset>
		<fieldset>

		<input type="submit" name="submit" value="NEXT" >
	</fieldset>


	</form>
	<?php
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
	<p align="center">All rights are reserved to DOT 7
	</p>
</div>
</html>
