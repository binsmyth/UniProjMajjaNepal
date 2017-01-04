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
		
		
		<?php
		
		
		$id=$_GET['id'];
		$_SESSION['id']=$id;
		if(!isset($_SESSION['cart']))
		{
			$_SESSION['cart']=array();
			array_push($_SESSION['cart'], $_SESSION['id']);
			echo "<p>You have successfully added following item in your cart</p>";
			echo "<fieldset><legend>Shopping Cart</legend>";
			echo "<table>";
			echo "<tr><th>IMAGE</th><th>EVENT NAME</th><th>QUANTITY</th><th>TOTAL</th></tr>";
			
			
			foreach($_SESSION['cart'] as $id)
			{
				
				$name=name($id, $name);
				$price=price($id, $price);
				echo "<tr><td><img src=\"../include/get_image.php?id='$id'\" width='40' height='40'></td><td>".$name."</td><td>1</td><td>".$price."</td></tr>";
				
			
			}
			echo "<tr><td colspan=\"2\">Total Price</td><td colspan=\"2\">AU$".$price."</td></tr>";
			echo "<tr><td colspan=\"2\"></td><td><a href=\"../index.php\"><input type='submit' value='CONTINUE SHOPPING'></a></td><td><a href=\"checkout.php\"><button type='button'>CHECKOUT</button></a></td></tr>";				
						echo "</table></fieldset>";

			
			
		}
		else 
		{
			
			
			
			echo "You have successfully added item in your cart<br>";
			echo "<fieldset><legend>Shopping Cart</legend>";
			echo "<table>";
			echo "<tr><th>IMAGE</th><th>EVENT NAME</th><th>QUANTITY</th><th>PRICE(AU$)</th></tr>";
			
			array_push($_SESSION['cart'], $_SESSION['id']);
			$hello=array_unique($_SESSION['cart']);
			
			
			$finprice=0;
			foreach($hello as $id)
			{
				
				$qty=total($id, $count);
				$name=name($id, $name);
				$price=price($id, $price);
				$totprice=$price*$qty;
				$finprice=$finprice+$totprice;
				echo "<tr><td><img src=\"../include/get_image.php?id='$id'\" width='40' height='40'></td><td>".$name."</td><td>$qty</td><td>".$price*$qty."</td></tr>";
				
			}
			
echo "<tr><td colspan=\"2\">Total Price</td><td colspan=\"2\">AU$".$finprice."</td></tr>";
echo "<tr><td colspan=\"2\"></td><td><a href=\"../index.php\"><input type='submit' value='CONTINUE SHOPPING'></a></td><td><a href=\"checkout.php\"><button type='button'>CHECKOUT</button></a></td></tr>";			
			echo "</table></fieldset>";
			
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

