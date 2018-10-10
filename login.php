<?php
include_once("connect.php");
if(isset($_POST["L"]))
{

	$username=$_POST["username"];	
	$password=$_POST["password"];
	$con=mysql_connect("localhost","root","root");
	mysql_select_db("research",$con);
	$username=mysql_real_escape_string($username);
	$password=mysql_real_escape_string($password);
	$qry="select * from login where username='$username' and password='$password'";
	$result=mysql_query($qry);
	$row=mysql_fetch_array($result);
	if(!$row)
	{
		$msg = "INVALID USERNAME OR PASSWORD";
		echo "<script>alert('$msg'); window.location.replace('index.html');</script>";
		
		mysql_close($con);
	}
	else
	{
		session_start();
		$_SESSION["user"]=$username;
		mysql_close($con);
		if($username==""||$password=="")
		{
		echo "username and password must be filled";
		}
		else
		header("location:home1.html");
	}
}
?>