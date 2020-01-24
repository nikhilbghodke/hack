<?php
include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pid=$_POST["pid"];
    $symptoms=$_POST["symptoms"];
    $prescription=$_POST["prescription"];
    $comment=$_POST["comment"];
    $precautions=$_POST["precautions"];

echo $pid;

    $sql = "INSERT INTO ehr (patientId, symptoms, prescription, comments, precautions, type ) VALUES ('$pid', '$symptoms', '$prescription', '$comment', '$precautions', '0')";

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully";
	} 	else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	mysqli_close($conn);
	header("Location: ../patients.html");
	die();

}

?>