<?php

include 'dbconfig.php';
// session_start();
// $sessionid = $_SESSION['id'];

if ($_GET['function'] == "display")
{

    $sql = "SELECT * FROM appointment";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {

            $id                             = $row['id'];
            $customerid                    = $row['customerid'];
            $sqlpengguna = "SELECT * FROM pengguna WHERE id = '$customerid'";
            $resultpengguna = $conn->query($sqlpengguna);
            $rowpengguna = $resultpengguna->fetch_assoc();
            $fullname               = $rowpengguna['fullname'];
            $service                        = $row['service'];
            $petname                        = $row['petname'];
            $dateappointment                    = $row['dateappointment'];
            $timeappointment                    = $row['timeappointment'];
            $note                    = $row['note'];

            $post_data[] = array("id"=>$id,"customerid"=>$fullname, "service"=>$service, "petname"=>$petname, "dateappointment"=>$dateappointment, "timeappointment"=>$timeappointment, "note"=>$note);

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