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
            $last_id = mysqli_insert_id($conn);
    	echo "New record created successfully";
	} 	else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


//
    $url="http://192.168.43.248:8090/ehr";
    $data = array(
        'patient'      => $pid,
        'doc'=>'d1',
        'hash'=>'12wssd',
        'ehrId'=>strval($last_id),
    );
    print_r(json_encode($data));
    $options = array(
        'http' => array(
        'method'  => 'POST',
        'content' => json_encode( $data ),
        'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result );



	mysqli_close($conn);
	header("Location: ../patients.html");
	die();

}

?>