<?php
$dropshadow="drop-shadow";
$width=100;
$height=150;
$class="captionated";

include("connect.php");
$con=mysql_connect("localhost","root","root");
mysql_select_db("research",$con);
$res=mysql_query("select * from users");
if($res){
 
 echo "<html><head> <link rel='stylesheet' type='text/css' href='css/bootstrap.css'/> </head> <body>";
	   echo "<div id='container' align='center'>";
	   echo " <table class='table table-hover' style='font-size:10pt'>";
	   	echo "<thead>"; 	
		echo "<tr class='success'><th>PAPER NAME</th><th>AUTHOR NAME</th><th>LINK</th></tr>";
	   echo "<tbody>";
while($row=mysql_fetch_array($res))
{
    $b_name=$row['b_name'];
	$bookpath=$row['book_path'];
	echo "<tr class='active'>";
	echo "<td>".$row['b_name']."</td>";
	echo "<td>".$row['uploader']."</td>";
	echo "<td><p><a href=".$bookpath." class=".$dropshadow.">".$b_name."<br></a></p></td>";
	echo "</tr>";
}
echo "</tbody></table></body></html>";
}

?>

