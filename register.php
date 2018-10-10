<?php
include_once("connect.php");
if(isset($_POST["R"]))
{

	$username=$_POST["username"];	
	$password=$_POST["password"];
	$cp=$_POST["confirmpassword"];
	$contact=$_POST["contact"];
	$email=$_POST["email"];
	
	$con=mysql_connect("localhost","root","root");
	mysql_select_db("research",$con);
	
	if($password==$cp)
	{
	  $qry="insert into login values('$username','$password','$contact','$email')";
	  $result=mysql_query($qry);
	  if(!$result)
	  {
	      $msg = "error in registration";
	      echo "<script>alert('$msg'); window.location.replace('index.html');</script>";
	      mysql_close($con);
		  
	  }
	  else
	  {
	      $msg = "Registered successfully";
	      echo "<script>alert('$msg'); window.location.replace('index.html');</script>";
	      mysql_close($con);
	      
      }
	}  
    else
	{
	   $msg = "password did not match";
	   echo "<script>alert('$msg'); window.location.replace('index.html');</script>";
	   mysql_close($con);
	   
    }
}
?> 