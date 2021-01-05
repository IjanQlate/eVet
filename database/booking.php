<?php

include 'dbconfig.php';
session_start();
$sessionid = $_SESSION['id'];

if ($_POST['function'] == "displaydropdown")
{
	//$sql = "SELECT * FROM animal WHERE customerid = '$typeofpet'";
    $sql = "SELECT * FROM animal WHERE customerid = '$sessionid'";
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

	$customerid = $sessionid; //SESSION ID $_POST['customerid'];
	$service = $_POST['service'];
	$petname = $_POST['petname'];
	$dateappointment = $_POST['dateappointment'];
	$timeappointment = $_POST['timeappointment'];
	$note = $_POST['note'];


	$sql = "INSERT INTO appointment (customerid, service, petname ,dateappointment, timeappointment, note)
	VALUES ('$customerid', '$service', '$petname' ,'$dateappointment', '$timeappointment', '$note')";

	('Location: eVetnew/notipo.html');
	if ($conn->query($sql) === TRUE) {
	  echo json_encode(array("status"=>"success", "message"=>"New record appointment created successfully"));
	} else {
	  echo json_encode(array("status"=>"error", "message"=>"Error: " . $sql . "<br>" . $conn->error));
	}

	$conn->close();

} else if ($_POST['function'] == "displaycustomertable")
{

    $sql = "SELECT * FROM appointment WHERE customerid = '$sessionid'";
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

			$data_push[] = array("date"=>$row['dateappointment'], "time"=>$row['timeappointment'], "petname"=>$row['petname'], "service"=>$row['service'], "note"=>$row['note']);

		}

		echo json_encode($data_push);	
	}
	else {
		echo json_encode(array("No data"));
	}

}


?>