<?php
// error_reporting(0);
include 'dbconfig.php';
session_start();
$sessionid = $_SESSION['id'];
$rolesystem = $_SESSION['role'];

if ($_POST['function'] == "display")
{

    if ($rolesystem == "Admin" || $rolesystem == "Veterinarian") {
        $sql = "SELECT * FROM record";
    } else {
        $sql = "SELECT * FROM record WHERE customerid = '$sessionid'";
    }

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {

            $id                             = $row['id'];
            $customerid                     = $row['customerid'];
            $sqlpengguna = "SELECT * FROM pengguna WHERE id = '$customerid'";
            $resultpengguna = $conn->query($sqlpengguna);
            $rowpengguna = $resultpengguna->fetch_assoc();
            $fullname                       = $rowpengguna['fullname'];
            $date                           = $row['date'];
            $record                         = $row['record'];

            $post_data[] = array("id"=>$id,"customerid"=>$customerid, "fullname"=>$fullname, "date"=>$date, "record"=>$record);

		}

		echo $post_data = json_encode(array('recordappointment' => $post_data));	
	}
	else {
        echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "recordappointment": []
        }';
	}

}
else if ($_POST['function'] == "displayname")
{
    $sql = "SELECT * FROM pengguna";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $username = $row['username'];
        $fullname = $row['fullname'];
        $password = $row['password'];
        $role = $row['role'];
        $phonenumber = $row['phonenumber'];

        $datapost[] = array("id"=>$id,"fullname"=>$fullname);
      }

      echo json_encode($datapost);

    } else {
      echo json_encode("No Data");
    }
    $conn->close();
}
else if ($_POST['function'] == "adddata") 
{

    $customername = $_POST['customername'];
    $date = $_POST['date'];
    $record = $_POST['record'];

    $sql = "INSERT INTO record (customerid, date, record)
    VALUES ('$customername', '$date', '$record')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
else if ($_POST['function'] == "edit") 
{

    $iddata = $_POST['iddata'];
    $customername = $_POST['customername'];
    $date = $_POST['date'];
    $record = $_POST['record'];

    $sql = "UPDATE record SET customerid='$customername', date='$date',record='$record'  WHERE id=$iddata";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}
else if ($_POST['function'] == "deletedata") 
{
    // print_r($_POST);
    // die();
    $iddata = $_POST['iddata'];
    // sql to delete a record
    $sql = "DELETE FROM record WHERE id=$iddata";

    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
else if ($_POST['function'] == "displaypet")
{

    // print_r($_POST);
    // die();
    $customerid = $_POST['customerid'];

    $sql = "SELECT * FROM animal WHERE customerid = '$customerid'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $petname = $row['petname'];

        $datapost[] = array("id"=>$id,"petname"=>$petname);
      }

      echo json_encode($datapost);

    } else {
      echo json_encode("No Data");
    }
    $conn->close();
}
else if ($_POST['function'] == "addnotification")
{
    $customername = $_POST['customername'];
    $service = $_POST['service'];
    $petname = $_POST['petname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notification = $_POST['notification'];

    $sql = "INSERT INTO appointment (customerid, service, petname, dateappointment, timeappointment, note)
    VALUES ('$customername', '$service', '$petname', '$date', '$time', '$notification')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}