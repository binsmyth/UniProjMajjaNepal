<?php
include '../include/functions.php';
database_fact();
$ename=$_GET['ename'];
echo $ename;
$sql="select * from event_types where event_name='$ename' ";
$result=mysql_query($sql);
while ($row=mysql_fetch_array($result)){
	$image=$row['event_image'];
	header ("content-type: image/jpeg");
	echo $image;
	

}
?>