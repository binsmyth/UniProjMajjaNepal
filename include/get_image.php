<?php
include 'functions.php';
database_fact();
$id=$_GET['id'];
$sql="select event_image from event_types where event_id=$id ";
$result=mysql_query($sql);
while ($row=mysql_fetch_array($result)){
	$image=$row['event_image'];
	header ("content-type: image/jpeg");
	echo $image;
	

}
?>