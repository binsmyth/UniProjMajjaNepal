<?php
include 'include/functions.php';
database_fact();
$file=$_FILES['upload']['tmp_name'];
$file_name=$_FILES['upload']['name'];

//It returns the file in a string ...//
$file_image=addslashes(file_get_contents($file));

//This function determines the  size of an image..We are finding out the whether the file is image or not ...
$image=getimagesize($file);
if($file > 0 )
{
	echo "something goes wrong here";
}

else 
{
	
	$sql="insert into images values ('','$file_name' , '$file_image')";
	mysql_query($sql);
	
	echo "Upload successfull";
	echo "<br>file name is: ".$_FILES['upload']['name'];

}
?>