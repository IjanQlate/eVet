<?php

include 'dbconfig.php';
// session_start();
// $sessionid = $_SESSION['id'];

if ($_GET['function'] == "display")
{

    $sql = "SELECT * FROM animal";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {

            $id                            = $row['id'];
            $customerid                    = $row['customerid'];
            $sqlpengguna = "SELECT * FROM pengguna WHERE id = '$customerid'";
            $resultpengguna = $conn->query($sqlpengguna);
            $rowpengguna = $resultpengguna->fetch_assoc();
            $fullname               = $rowpengguna['fullname'];
            $phonenumber               = $rowpengguna['phonenumber'];
            $username               = $rowpengguna['username'];
            $typeofpet                        = $row['typeofpet'];
            $petname                        = $row['petname'];
            $breed                    = $row['breed'];

            $post_data[] = array("id"=>$id,"customerid"=>$fullname, "phonenumber"=>$phonenumber, "username"=>$username, "typeofpet"=>$typeofpet, "petname"=>$petname, "breed"=>$breed);

		}

		echo $post_data = json_encode(array('customerdata' => $post_data));	
	}
	else {
        echo '{
            "sEcho": 1,
            "iTotalRecords": "0",
            "iTotalDisplayRecords": "0",
            "customerdata": []
        }';
	}

}