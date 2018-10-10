<?php
if(isset($_POST["L"])){
$con=mysql_connect("localhost","root","root");
mysql_select_db("research",$con);
$b_name=$_POST["b_name"]; 
$res=mysql_query("delete from users where b_name='$b_name'");
if($res)
{
    $msg = "deleted " . $b_name . " successfully";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		mysql_close($con);
	}
	else
	{
	$msg = "error";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		mysql_close($con);
		}
		}
		?>
		
		<html> 
  <head>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.css'/> </head>
<body>
<div class="form-group">
     
	 <div align="center">
	       <form action="" method="POST">
		    <label for="sel1">Enter name of the paper</label>
	        <input type="text" class="btn btn-default" placeholder"Search" name="b_name"> 
	        <input type="submit" name="L" class="btn btn-default" value="Submit" name="submit"> 					
  	</form>
	
	<br>
</div>
</div>
</body>
</html>