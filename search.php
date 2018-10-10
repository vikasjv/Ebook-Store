<?php
if(isset($_POST["L"])){
$con=mysql_connect("localhost","root","root");
mysql_select_db("research",$con);
$title=$_POST["title"]; 
  $res=mysql_query("select * from user where title='$title'");
   if(!$res)
   {
         $msg = "No data found";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		mysql_close($con);
   }
   else
   {
       echo "<html><head> <link rel='stylesheet' type='text/css' href='css/bootstrap.css'/> </head> <body>";
	   echo "<div id='container' align='center'>";
	   echo " <table class='table table-hover' style='font-size:10pt'>";
	   echo "<thead>"; 	
	   echo "<tr class='success'><th>NAME</th><th>TITLE</th><th>CONTACT</th></tr>"; 
	   echo "</thead>";
	   echo "<tbody>";
	   while($row=mysql_fetch_array($res))
    {
        echo "<tr class='active'>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['title']."</td>";
		echo "<td>".$row['contact']."</td>";
		
		echo "</tr>";
    }
	echo "</tbody>";
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
		    <label for="sel1">Select one:</label>
	        <input type="text" class="btn btn-default" placeholder"Search" name="title"> 
	        <input type="submit" name="L" class="btn btn-default" value="Submit" name="submit"> 					
  	</form>
	
	<br>
</div>
</div>
</body>
</html>