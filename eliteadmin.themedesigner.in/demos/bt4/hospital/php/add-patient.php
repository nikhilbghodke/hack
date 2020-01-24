<?php
include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    $aadhar=$_POST["pid"];
    $name=$_POST["name"];
    $dob=$_POST["bdate"];
    $gender=$_POST["gender"];
    $number=$_POST["number"];


    $sql = "INSERT INTO patient (aadhar, name, DOB, gender, phnumber) VALUES ('$aadhar', '$name', '$dob', '$gender', '$number')";

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully";
	} 	else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

}

?>