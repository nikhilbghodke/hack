<?php
include("db_connect.php");
$_POST = json_decode(file_get_contents('php://input'), true);
$json="[";
for($i=0;$i<count($_POST);$i++)
	{
		$a=$_POST[$i];
		//echo $a;
		$sql = "SELECT * FROM ehr where id='$a' ";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result))
			{
				//print_r($row);
				$json=$json.'{"patientId":'.$row['patientId'].',"prescription":'.$row['prescription'].',"comments":'.$row['comments'].',"symptoms":'.$row['symptoms'].',"precautions":'.$row['precautions'].'},';
			}

			
	}
	$json.="]";
			echo $json;

?>

                        
                        
