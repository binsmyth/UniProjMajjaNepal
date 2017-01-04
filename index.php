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
						
			<br>
			
	</div>
	
	<div id="right-content">
		<?php
		
		
		$sql="select * from categories";
		$query=mysql_query($sql);
		while ($row=mysql_fetch_array($query))
		{
			$id=$row['category_id'];
			$sql1="select * from event_types where category_id=$id";
			$query1=mysql_query($sql1);
			while ($row1=mysql_fetch_array($query1))
			{
				echo "<table width=\"220\"><tr>";
				$id=$row1['event_id'];
				echo "<td>";
				echo "<a href=\"users/each_page.php?id='$id'\"><img src=\"include/get_image.php?id='$id'\" width='180' height='150'></a>";
				echo "</td></tr><tr><td>";
				echo strtoupper($row1['event_name'])."<br>";
				echo $row1['event_address']."</br>";
				echo "Ticket_Price: ".$row1['event_price']."</br>";
				echo "<a href=\"users/order.php?id=$id\"><button type=\"button\">Add to Cart</button></a>";
				echo "</td></tr></table>";
			
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
	<p align="center">All rights are reserved to DOT 7 - <a href="sitemap.php" style="text-decoration:none; color:red;">SITE MAP</a></p>
	
</div>
</html>
