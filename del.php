<?php

$con=mysql_connect("localhost","root","root");
mysql_select_db("iem",$con);
$b_name=$_POST["title"]; 
$res=mysql_query("delete from users where item_no='$b_name'");
if($res)
{
    $msg = "deleted  successfully";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		mysql_close($con);
	}
	else
	{
	$msg = "error";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		mysql_close($con);
		}
				?>
		