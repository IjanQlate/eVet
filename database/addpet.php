<?php
include 'dbconfig.php';

if($_POST['function'] == 'displaypet')
{

    $sql = "SELECT * FROM breed";
    $result = $conn->query($sql);


}

?>