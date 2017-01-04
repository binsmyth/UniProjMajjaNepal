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


<style type="text/css">
/*This style for the calender*/
.main {
width:200px;
border:1px solid black;
}

.month {
background-color:lightblue;
font:bold 12px verdana;
color:red;
}

.daysofweek {
background-color:gray;
font:bold 12px verdana;
color:lightyellow;
}

.days {
font-size: 12px;
font-family:verdana;
color:black;
background-color: lightblue;
padding: 2px;
}

.days #today{
font-weight: bold;
color: red;
}


</style>


<script type="text/javascript" src="basiccalendar.js">

</script> 
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
						<form name="subscribe" action="users/subscribe.php" method="POST">
			<fieldset><legend>Subscribe With us</legend>

				<input type="text" name="email" value="youremail@mail.com">
				<input type="submit" name="submit" Value="Subscribe">
			
			</fieldset>
		
		</form>
		
			
			
			
			<br>
			<br>
			<br>
			<script type="text/javascript">

			var todaydate=new Date()
			var curmonth=todaydate.getMonth()+1 //get current month (1-12)
			var curyear=todaydate.getFullYear() //get current year

			document.write(buildCal(curmonth ,curyear, "main", "month", "daysofweek", "days", 1));
			</script>
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
</html>
