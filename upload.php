
<?php
if(isset($_POST["L"])){

$booktarget_dir = "uploads/pdf/";


$booktarget_file = $booktarget_dir . basename($_FILES["pdffileToUpload"]["name"]);

$uploadOk = 1;


$bookFileType = pathinfo($booktarget_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($booktarget_file) ) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;


}*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	    if (move_uploaded_file($_FILES["pdffileToUpload"]["tmp_name"],$booktarget_file)) {
          $msg = "The file " . basename( $_FILES["pdffileToUpload"]["name"]). " has been uploaded.";
		  echo "<script type='text/javascript'>alert('$msg');</script>";
	include("connect.php");
	$con=mysql_connect("localhost","root","root");
	mysql_select_db("research",$con);
	$d=date("Y/m/d");
	
	$sql="insert into users(b_name,book_path,uploader,upload_date) values('$_POST[bname]','$booktarget_file','$_POST[uploader]','$d')";
	mysql_query($sql);
    } else {
        $msg = "error in uploading file";
		  echo "<script type='text/javascript'>alert('$msg');</script>";
    }

}
}
?>

<html>
<head>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.css'/>
  </head>
<body>
 <div align="center" style="width:600; height:500">
    <center>
<form action="" method="post" enctype="multipart/form-data">
 <table  class='table table-hover' cellpadding="3" cellspacing="3" style="border-collapse: collapse"  width="40%" id="AutoNumber1">
     <tr class='active'>
        <td width="70%"><font size="4">Author name</td></font>
        <td width="30%"><font size="4"><input type="text" name="uploader" size="20"onKeyPress="ischar()"></font></td>
      </tr> 
	  <tr class='active'>
        <td width="70%"><font size="4">Paper Name</td></font>
        <td width="30%"><font size="4"><input type="text" name="bname" size="20"onKeyPress="ischar()"></font></td>
      </tr>
    
Select  to upload : <tr class='active'>
        <td width="70%"><font size="4">Upload paper(pdf) </font></td>
        <td width="30%"><font size="4"><input type="file" name="pdffileToUpload" id="pdffileToUpload"><br><br></font></td>
      </tr>
	  </table>
        <input type="submit" name="L" class="btn btn-default" value="upload" name="submit" onClick="check()">
        <input type="reset" class="btn btn-default" value="Reset" name="reset"></p>
</center>
</div>
</body>
</html>