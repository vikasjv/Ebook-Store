<?php
	$con=mysql_connect("localhost","root","deepu");
	if(!$con)
	die("Connection Error".mysql_error());

	mysql_select_db("book_store");
?>
