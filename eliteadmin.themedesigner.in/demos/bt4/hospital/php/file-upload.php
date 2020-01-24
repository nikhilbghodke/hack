<?php 
include("db_connect.php");
if (isset($_FILES['file'])){
// Where the file is going to be stored
 $target_dir = "upload/";
 $file = $_FILES['file']['name'];
 $path = pathinfo($file);
 $filename = $path['filename'];
 $ext = $path['extension'];
 $temp_name = $_FILES['file']['tmp_name'];
 $path_filename_ext = $target_dir.$filename.".".$ext;
 
// Check if file already exists
if (file_exists($path_filename_ext)) {
 echo "Sorry, file already exists.";
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
     $sql = "INSERT INTO ehr (file, type) VALUES ('$file', '1')";

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully";
	} 	else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	mysqli_close($conn);
 echo "Congratulations! File Uploaded Successfully.";
 header("Location: ../patients.html");
	die();
 }
}
?>