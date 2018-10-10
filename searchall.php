<?php
if(isset($_POST["L"])){
$con=mysql_connect("localhost","root","root");
mysql_select_db("research",$con);
$title=$_POST["title"]; 
  $res=mysql_query("select * from user");
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
 	
