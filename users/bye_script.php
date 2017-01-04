<?php
SESSION_START();
if(isset($_SESSION['username']))
{
	$id=$_GET['id'];
	header("location: order.php?id=$id");
}
else {
	echo "Please login and come back again</br>";
	echo "<a href='../index.php'>Back</a>";
}
?>