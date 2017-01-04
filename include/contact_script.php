<?php


$fname=$_POST['first_name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$detail=$_POST['detail'];
$to= 'dpskarki@gmail.com';
$message=$detail;
$headers='From: $email';


if($fname=="" or $email=="" or $subject=="" or $detail=="")
{
	echo "Please fill up all the fields";
}

else 
{
	
	if(mail($to, $subject, $message, $headers))
	{
		echo "You have successfully sent email";
	}
	else 
	{
		echo "You are done";
	}
}

?>