<?php
function database_fact()
{
	$host="localhost";
$data_user="root";
$data_pass-" ";
$data="majja_nepal";
$connection=mysql_connect("$host", "$data_user", "$data_pass") or die ("Database connection Failed");
mysql_select_db("$data", $connection);
}


function name($hi, $nam)
{
	
	$sql1="select * from event_types where event_id='$hi'";
	$query1=mysql_query($sql1);
	
	
	while ($row1=mysql_fetch_array($query1))
	{
		
		$nam=$row1['event_name'];
		
		
			
			
	}
return $nam;

		
}



function price($hi, $pri)
{

	$sql1="select * from event_types where event_id='$hi'";
	$query1=mysql_query($sql1);
	
	
	while ($row1=mysql_fetch_array($query1))
	{
		
		$pri=$row1['event_price'];
		
		
			
			
	}
return $pri;
	
}

function total($hi, $count)
{
	$count=0;
	foreach($_SESSION['cart'] as $id)
	{
		
		if($id==$hi)
		{
			
			$count=$count+1;
		}
		
	}
	return $count;
	
}

function sum($hi, $price)
{
	$sql="select * from event_types where event_id='$hi'";
	$query=mysql_query($sql);
	
	
	while ($row=mysql_fetch_array($query))
	{
		
		return $row['event_price'];
			
			
			
	}
}
	
	
	
	
	
	?>