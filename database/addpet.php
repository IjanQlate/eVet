<?php
include 'dbconfig.php';

if($_POST['function'] == 'displaypet')
{

	$dataarray = array();
	$array_breed = array();
    $sql = "SELECT DISTINCT(typeofpeet) FROM breed";
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		 
		 array_push($dataarray,$row["typeofpeet"]);
	
	  }
	} else {
	  echo "0 results";
	}
	
	echo json_encode($dataarray);
	
	$conn->close();

} else if($_POST['function'] == 'displaybreed') {
	
	$dataarray = array();
	$typeofpet = $_POST['typeofpet'];
	
    $sql = "SELECT * FROM breed WHERE typeofpeet = '$typeofpet'";
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		 
		 array_push($dataarray,$row["breed"]);
	
	  }
	}
	echo json_encode($dataarray);
	
	$conn->close();
} else if($_POST['function'] == 'savedata') {
	
	$sessionname = 1;
	//print_r($_POST);
	
	for ($i=1; $i<=$_POST['noofpet']; $i++)
	{
		$typeofpet = $_POST['typeofpet_'.$i];
		$name = $_POST['name_'.$i];
		$breed = $_POST['breed_'.$i];
		
			$sql = "INSERT INTO animal (customerid, typeofpet, petname,breed)
	VALUES ($sessionname, '$typeofpet', '$name', '$breed')";

		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
	

	$conn->close();


}

?>