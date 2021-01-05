<?php
include 'dbconfig.php';

// - login tu msuk ke page yg spatutnya lah. petowner (index2) admin (indexadmin) veterinarian (indexvet)

/*if(isset($_SESSION['id'])!="")
{
	header("Location: index.php");
}

if($_POST['function'] == 'login')
{
	$role = mysql_real_escape_string($_POST['role']);
	$email = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$res=mysql_query("SELECT * FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);
	
	if($row['password']==md5($password))
	{
		$_SESSION['id'] = $row['id'];
		header("Location: index.php");
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
        <?php
	}
	
}*/

if($_POST['function'] == 'login')
{
    $role = $_POST['data']['0']['value'];
    $email = $_POST['data']['1']['value'];
    $password = $_POST['data']['2']['value'];

    $sql = "SELECT * FROM pengguna WHERE username = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();

        if ($row['role'] == $role) {

            if ($row['password'] == $password) {

                session_start();
                $_SESSION['id'] = $row['id'];
        
                if ($role == 'Pet Owner') { $url = 'index2.html'; }
                if ($role == 'Admin') { $url = 'indexadmin.html'; }
                if ($role == 'Veterinarian') { $url = 'indexvet.html'; }
        
                echo json_encode(array('status'=>'success', 'message'=>'Successfully authenticated', 'url'=>$url));

            } else {
                echo json_encode(array('status'=>'failed', 'message'=>'Invalid your username or password'));
            }

        } else {
            echo json_encode(array('status'=>'failed', 'message'=>'Invalid role for your account'));
        }

    } else {
        echo json_encode(array('status'=>'failed', 'message'=>'Email address not exist in system'));
    }
    $conn->close();
} else if ($_POST['function'] == 'register'){

    $role = $_POST['data']['0']['value'];
    $name = $_POST['data']['1']['value'];
    $phonenumber = $_POST['data']['2']['value'];
    $email = $_POST['data']['3']['value'];
    $password = $_POST['data']['4']['value'];
    $confirmpassword = $_POST['data']['5']['value'];
   /* $typeofpet = $_POST['data']['6']['value'];
    $petname = $_POST['data']['7']['value'];
    $breed = $_POST['data']['8']['value']; */

    // Check email address exist ke x
    $sql = "SELECT * FROM pengguna WHERE username = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode(array('status'=>'failed', 'message'=>'Email address already exist in system'));
    } else {

        // Insert into table pengguna
        $sql = "INSERT INTO pengguna (username, fullname, password,role,phonenumber)
        VALUES ('$email','$name','$password','$role','$phonenumber')";
        
        if ($conn->query($sql) === TRUE) {
          
            if ($role == "Pet Owner") {

                $sql = "SELECT * FROM pengguna WHERE username = '$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
    
                $customerid = $row['id'];
                
                // Insert into table animal
              /*  $sql = "INSERT INTO animal (customerid, typeofpet, petname,breed)
                VALUES ('$customerid','$typeofpet','$petname','$breed')"; */

                if ($conn->query($sql) === TRUE) {
                    echo json_encode(array('status'=>'success', 'message'=>'Successfully registered new user'));
                } else {
                    echo json_encode(array('status'=>'failed', 'message'=>'failed to insert data animal'));
                }

            } else {
                echo json_encode(array('status'=>'success', 'message'=>'Successfully registered new user'));
            }

        } else {
            echo json_encode(array('status'=>'failed', 'message'=>'failed to insert data pengguna'));
        }

    }

    $conn->close();

}
?>