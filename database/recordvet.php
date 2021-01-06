<?php

include 'dbconfig.php';
session_start();
$sessionid = $_SESSION['id'];
$rolesystem = $_SESSION['role'];

if ($_GET['function'] == "display")
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

            $post_data[] = array("id"=>$id,"fullname"=>$fullname, "date"=>$date, "record"=>$record);

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