<?php

include 'dbconfig.php';


if ($_POST['function'] == "displaydropdown")
{
    //$sql = "SELECT * FROM animal WHERE customerid = '$typeofpet'";
    $sql = "SELECT * FROM animal WHERE customerid = '1'";
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

			$data_push[] = array($row['petname']);

		}

		echo json_encode($data_push);	
	}
	else {
		echo json_encode(array("No data"));
	}

} else if ($_POST['function'] == "saveappointment")
{

	$customerid = '1'; //SESSION ID $_POST['customerid'];
	$service = $_POST['service'];
	$petname = $_POST['petname'];
	$dateappointment = $_POST['dateappointment'];
	$timeappointment = $_POST['timeappointment'];


	$sql = "INSERT INTO appointment (customerid, service, petname ,dateappointment, timeappointment)
	VALUES ('$customerid', '$service', '$petname' ,'$dateappointment', '$timeappointment')";

	if ($conn->query($sql) === TRUE) {
	  echo json_encode(array("status"=>"success", "message"=>"New record appointment created successfully"));
	} else {
	  echo json_encode(array("status"=>"error", "message"=>"Error: " . $sql . "<br>" . $conn->error));
	}

	$conn->close();

} else if ($_POST['function'] == "displaycustomertable")
{

    $sql = "SELECT * FROM appointment WHERE customerid = '1'";
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

			$data_push[] = array("date"=>$row['dateappointment'], "time"=>$row['timeappointment'],"service"=>$row['service']);

		}

		echo json_encode($data_push);	
	}
	else {
		echo json_encode(array("No data"));
	}

}


?>